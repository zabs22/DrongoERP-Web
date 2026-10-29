<?php

namespace Tests\Feature;

use App\Models\CompanyProfile;
use App\Models\User;
use App\Support\PackageCatalog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardPlanTest extends TestCase
{
    use RefreshDatabase;

    private function userOnPlan(?string $plan): User
    {
        $user = User::factory()->create();
        $user->companyProfile()->create([
            'companyName' => 'Acme Trading',
            'email' => $user->email,
            'selectedPackage' => $plan,
            'totalAmount' => $plan ? ['package' => $plan, 'currency' => 'ETB', 'monthly' => 4166, 'modules' => ['Point of Sale', 'Inventory']] : null,
        ]);

        return $user;
    }

    public function test_dashboard_summarises_the_plan_without_the_upgrade_options(): void
    {
        $user = $this->userOnPlan('Factory');
        $user->companyProfile->update(['totalAmount' => ['package' => 'Factory', 'currency' => 'ETB', 'monthly' => 16666, 'modules' => []]]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Your plan')
            ->assertSee('ETB 16,666')
            ->assertSee('Standard Factory set')
            ->assertSee('Accounting')
            ->assertSee('Daily Backup')
            ->assertSee('See upgrade options')
            ->assertDontSee('Upgrade your plan')
            ->assertDontSee('name="plan"', false);
    }

    public function test_upgrade_page_lists_the_higher_plans(): void
    {
        $this->actingAs($this->userOnPlan('Startup'))
            ->get(route('upgrade'))
            ->assertOk()
            ->assertSee('Upgrade your plan')
            ->assertSee('value="factory"', false)
            ->assertSee('value="enterprise"', false)
            ->assertDontSee('value="shop"', false);
    }

    public function test_upgrading_to_a_priced_plan_switches_immediately(): void
    {
        $user = $this->userOnPlan('Startup');

        $this->actingAs($user)
            ->post(route('dashboard.upgrade'), ['plan' => 'factory'])
            ->assertRedirect(route('upgrade'));

        $company = $user->companyProfile->fresh();
        $this->assertSame('Factory', $company->selectedPackage);
        $this->assertEquals(16666, $company->totalAmount['monthly']);
    }

    public function test_upgrading_to_a_custom_priced_plan_records_a_request(): void
    {
        $user = $this->userOnPlan('Startup');

        $this->actingAs($user)->post(route('dashboard.upgrade'), ['plan' => 'enterprise']);

        $company = $user->companyProfile->fresh();
        $this->assertSame('Startup', $company->selectedPackage);
        $this->assertSame('Enterprise', $company->requestedPackage);
        $this->actingAs($user)->get(route('dashboard'))->assertSee('Upgrade to Enterprise pending');
        $this->actingAs($user)->get(route('upgrade'))->assertSee('Cancel request');
    }

    public function test_downgrades_are_rejected(): void
    {
        $user = $this->userOnPlan('Factory');

        $this->actingAs($user)
            ->post(route('dashboard.upgrade'), ['plan' => 'shop'])
            ->assertSessionHasErrors('plan');

        $this->assertSame('Factory', $user->companyProfile->fresh()->selectedPackage);
    }

    public function test_dashboard_works_for_users_without_a_company(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee("You don't have a plan yet", false);
    }
    public function test_a_pending_request_can_be_cancelled(): void
    {
        $user = $this->userOnPlan('Startup');
        $this->actingAs($user)->post(route('dashboard.upgrade'), ['plan' => 'enterprise']);

        $this->actingAs($user)
            ->delete(route('dashboard.cancelRequest'))
            ->assertRedirect(route('upgrade'));

        $company = $user->companyProfile->fresh();
        $this->assertNull($company->requestedPackage);
        $this->assertNull($company->requestedAmount);
        $this->assertSame('Startup', $company->selectedPackage);
    }

    public function test_choosing_modules_on_a_package_page_updates_the_signed_in_account(): void
    {
        $user = $this->userOnPlan('Shop');
        $section = PackageCatalog::find('startup')['sections'][0];
        $module = $section['groups'][0]['modules'][0];

        $this->actingAs($user)
            ->get(route('DrongoERP.package', 'startup'))
            ->assertOk()
            ->assertSee('Switch to Startup')
            ->assertSee('Back to dashboard');

        $this->actingAs($user)
            ->post(route('DrongoERP.package.select', 'startup'), ['section' => $section['key'], 'modules' => [$module['id']]])
            ->assertRedirect(route('dashboard'));

        $company = $user->companyProfile->fresh();
        $this->assertSame('Startup', $company->selectedPackage);
        $this->assertSame([$module['name']], $company->totalAmount['modules']);
        $this->assertSame(1, CompanyProfile::count());
    }

    public function test_package_page_offers_no_self_service_downgrade(): void
    {
        $user = $this->userOnPlan('Factory');
        $section = PackageCatalog::find('shop')['sections'][0];

        $this->actingAs($user)->get(route('DrongoERP.package', 'shop'))->assertSee('Contact us to change plan');

        $this->actingAs($user)
            ->post(route('DrongoERP.package.select', 'shop'), ['section' => $section['key'], 'modules' => [collect($section['groups'])->pluck('modules')->flatten(1)->concat($section['addons'])->first()['id']]])
            ->assertSessionHasErrors('modules');
        $this->assertSame('Factory', $user->companyProfile->fresh()->selectedPackage);
    }

    public function test_signed_up_clients_skip_the_get_started_form(): void
    {
        $user = $this->userOnPlan('Shop');

        $this->actingAs($user)->get(route('DrongoERP.getStarted', ['package' => 'Factory']))
            ->assertRedirect(route('DrongoERP.package', 'factory'));
        $this->actingAs($user)->get(route('DrongoERP.getStarted'))
            ->assertRedirect(route('dashboard'));
    }
}
