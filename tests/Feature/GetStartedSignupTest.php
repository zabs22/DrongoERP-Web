<?php

namespace Tests\Feature;

use App\Models\CompanyProfile;
use App\Models\User;
use App\Support\PackageCatalog;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class GetStartedSignupTest extends TestCase
{
    use RefreshDatabase;

    private function formData(array $overrides = []): array
    {
        return array_merge([
            'companyName' => 'Acme Trading',
            'companyPhone' => '+251 911 000000',
            'contactName' => 'Abebe Kebede',
            'title' => 'Owner',
            'email' => 'abebe@acme.test',
            'contactPhone' => '+251 922 000000',
            'countryName' => 'Ethiopia',
            'city' => 'Addis Ababa',
            'businessGroup' => ['plc'],
            'businessType' => ['retail'],
            'goodService' => 'Electronics',
            'businessIndustry' => ['trading'],
            'numOfBranches' => 2,
            'numOfEmployee' => '11To50',
            'requestType' => 'newSystem',
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ], $overrides);
    }

    public function test_get_started_form_creates_a_dashboard_account(): void
    {
        Notification::fake();
        $package = PackageCatalog::names()[0];

        $this->get(route('DrongoERP.getStarted', ['package' => $package]));
        $this->post(route('form.submitGetStarted'), $this->formData())
            ->assertRedirect(route('DrongoERP.finalSubmit'));

        $this->get(route('DrongoERP.finalSubmit'))->assertRedirect(route('DrongoERP.finalPage'));

        $user = User::where('email', 'abebe@acme.test')->firstOrFail();
        $this->assertAuthenticatedAs($user);
        $this->assertSame('Abebe Kebede', $user->name);
        $this->assertSame($package, $user->companyProfile->selectedPackage);
        $this->assertFalse(Schema::hasColumn('company_profiles', 'password'));

        // Email verification disabled for now: no email is sent and the dashboard opens straight away.
        Notification::assertNothingSent();
        $this->get(route('DrongoERP.finalPage'))->assertOk()->assertSee('Go to your dashboard');
        $this->get(route('dashboard'))->assertOk()->assertSee('Acme Trading');

        // When verification is re-enabled, restore these checks:
        // Notification::assertSentTo($user, VerifyEmail::class);
        // $this->get(route('dashboard'))->assertRedirect(route('verification.notice'));
        // $this->get(URL::temporarySignedRoute('verification.verify', now()->addHour(), ['id' => $user->id, 'hash' => sha1($user->email)]));
        // $this->assertTrue($user->fresh()->hasVerifiedEmail());

        // Revisiting the submit URL must not create a second account.
        $this->get(route('DrongoERP.finalSubmit'))->assertRedirect(route('DrongoERP.finalPage'));
        $this->assertSame(1, CompanyProfile::count());

        // The chosen password works on the Jetstream login page.
        auth()->guard('web')->logout();
        $this->post(route('login'), ['email' => 'abebe@acme.test', 'password' => 'secret-password'])
            ->assertRedirect(route('dashboard'));
    }

    public function test_without_a_plan_the_form_leads_to_the_package_list(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData())
            ->assertRedirect(route('DrongoERP.choosePackage'));

        $this->get(route('DrongoERP.choosePackage'))->assertOk();
        $this->get('/choose-plan')->assertRedirect('/choosePackage');
    }

    public function test_only_catalogue_plans_can_be_chosen(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData());

        $this->get(route('DrongoERP.submitChosenPackage', 'Free Trial'))->assertNotFound();
        $this->assertSame(0, User::count());
    }

    public function test_a_plan_priced_on_request_is_recorded_as_a_request_at_sign_up(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData());
        $this->get(route('DrongoERP.submitChosenPackage', 'Enterprise'))
            ->assertRedirect(route('DrongoERP.finalSubmit'));
        $this->get(route('DrongoERP.finalSubmit'));

        $company = CompanyProfile::firstOrFail();
        $this->assertNull($company->selectedPackage);
        $this->assertSame('Enterprise', $company->requestedPackage);
        $this->assertNotNull($company->upgradeRequestedAt);

        $this->get(route('DrongoERP.finalPage'))->assertOk()->assertSee('Enterprise (requested)');
        $this->get(route('dashboard'))->assertOk()->assertSee('Request for Enterprise pending');
        $this->get(route('upgrade'))->assertOk()->assertDontSee('Your current plan stays active');
    }

    public function test_a_plan_with_a_price_is_active_straight_after_sign_up(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData());
        $this->get(route('DrongoERP.submitChosenPackage', 'Startup'));
        $this->get(route('DrongoERP.finalSubmit'));

        $company = CompanyProfile::firstOrFail();
        $this->assertSame('Startup', $company->selectedPackage);
        $this->assertSame(4166, $company->totalAmount['monthly']);
        $this->assertNull($company->requestedPackage);
    }

    public function test_old_sign_up_form_url_redirects_to_get_started(): void
    {
        $this->get('/form')->assertRedirect('/get-started');
        $this->post('/createCompanyProfile')->assertNotFound();
    }

    public function test_email_already_registered_is_rejected(): void
    {
        User::factory()->create(['email' => 'abebe@acme.test']);

        $this->post(route('form.submitGetStarted'), $this->formData())
            ->assertSessionHasErrors('email');
    }

    public function test_international_phone_numbers_are_accepted_and_normalised(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData([
            'companyPhone' => '+254 (712) 345-678',
            'contactPhone' => '+1 202-555-0143',
        ]))->assertSessionHasNoErrors();

        $this->assertSame('+254712345678', session('signup_data.phoneNum'));
        $this->assertSame('+12025550143', session('signup_data.contactPhone'));
    }

    public function test_phone_numbers_need_a_country_code(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData(['contactPhone' => '0911 234 567']))
            ->assertSessionHasErrors('contactPhone');
    }

    public function test_cities_are_listed_per_country(): void
    {
        $this->get(route('DrongoERP.cities', 'ET'))
            ->assertOk()
            ->assertJsonFragment(['Addis Ababa']);

        $this->get(route('DrongoERP.cities', 'ZZ'))->assertOk()->assertExactJson([]);
    }

    public function test_country_must_come_from_the_list_but_city_can_be_typed(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData(['countryName' => 'Atlantis']))
            ->assertSessionHasErrors('countryName');

        $this->post(route('form.submitGetStarted'), $this->formData(['countryName' => 'Kenya', 'city' => 'A small town not in the list']))
            ->assertSessionHasNoErrors();
    }

    public function test_goods_or_services_is_optional(): void
    {
        $this->post(route('form.submitGetStarted'), $this->formData(['goodService' => '']))
            ->assertSessionHasNoErrors();

        $this->assertNull(session('signup_data.goodService'));
    }

    public function test_jetstream_register_page_sends_visitors_to_get_started(): void
    {
        $this->get('/register')->assertRedirect('/get-started');
    }
}
