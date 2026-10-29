<?php

namespace Tests\Feature;

use App\Models\CompanyProfile;
use App\Models\User;
use App\Support\PackageCatalog;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
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
            'businessGroup' => 'plc',
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
        $this->assertNull($user->companyProfile->password);

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

    public function test_jetstream_register_page_sends_visitors_to_get_started(): void
    {
        $this->get('/register')->assertRedirect('/get-started');
    }
}
