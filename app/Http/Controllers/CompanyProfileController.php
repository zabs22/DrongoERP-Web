<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\CompanyProfile;
use App\Models\User;
use App\Support\PackageCatalog;
use App\Support\Geo;

class CompanyProfileController extends Controller
{
    // Phones are stored in international (E.164) form: + country code, then up to 14 digits.
    private function normalizePhones(Request $request): void
    {
        foreach (['companyPhone', 'contactPhone'] as $field) {
            if (is_string($request->input($field))) {
                $request->merge([$field => preg_replace('/[\s\-().]/', '', $request->input($field))]);
            }
        }
    }

    // Whether a value is already stored, ignoring case and surrounding spaces ("Acme PLC" = "acme plc ").
    private function isTaken(string $table, string $column, $value): bool
    {
        return DB::table($table)
            ->whereRaw('LOWER(TRIM(' . DB::getQueryGrammar()->wrap($column) . ')) = ?', [mb_strtolower(trim((string) $value))])
            ->exists();
    }

    // Step 1 details that must not already belong to a signed-up company.
    private function contactRules(): array
    {
        $unusedPhone = function (string $attribute, $value, \Closure $fail) {
            if (CompanyProfile::where('phoneNum', $value)->orWhere('contactPhone', $value)->exists()) {
                $fail('This phone number is already registered. Please log in instead.');
            }
        };
        $phone = ['required', 'string', 'regex:/^\+[1-9]\d{6,14}$/', $unusedPhone];

        return [
            'companyName'  => ['required', 'string', 'max:255', function (string $attribute, $value, \Closure $fail) {
                if ($this->isTaken('company_profiles', 'companyName', $value)) {
                    $fail('A company with this name is already registered. Please log in instead.');
                }
            }],
            'companyPhone' => $phone,
            'email'        => ['required', 'email', 'max:255', function (string $attribute, $value, \Closure $fail) {
                if ($this->isTaken('company_profiles', 'email', $value) || $this->isTaken('users', 'email', $value)) {
                    $fail('An account with this email already exists. Please log in instead.');
                }
            }],
            'contactPhone' => $phone,
        ];
    }

    private function contactMessages(): array
    {
        return [
            'companyPhone.regex' => 'Please enter a valid phone number with its country code, e.g. +251 911 234 567.',
            'contactPhone.regex' => 'Please enter a valid phone number with its country code, e.g. +251 911 234 567.',
        ];
    }

    // Called by the Get Started form while the user types and when leaving step 1, so taken
    // details are flagged right away. Only the fields sent are checked.
    public function checkContact(Request $request){
        $this->normalizePhones($request);
        $request->validate(array_intersect_key($this->contactRules(), $request->all()), $this->contactMessages());

        return response()->noContent();
    }

    public function submitGetStarted(Request $request){
        $this->normalizePhones($request);

        $validated = $request->validate($this->contactRules() + [
            'contactName'           => 'required|string|max:255',
            'title'                 => 'required|string|max:255',

            'countryName'           => ['required', Rule::in(Geo::countryNames())],
            'city'                  => 'required|string|max:255',
            'businessGroup'         => 'required|array|min:1',
            'businessGroup.*'       => Rule::in(array_keys(CompanyProfile::ORGANIZATIONAL_STRUCTURES)),
            'otherBusinessGroup'    => [Rule::requiredIf(in_array('other', (array) $request->input('businessGroup'), true)), 'nullable', 'string', 'max:255'],
            'businessType'          => 'required|array|min:1',
            'businessType.*'        => Rule::in(array_keys(CompanyProfile::NATURES_OF_BUSINESS)),
            'otherBusinessType'     => [Rule::requiredIf(in_array('other', (array) $request->input('businessType'), true)), 'nullable', 'string', 'max:255'],
            'goodService'           => 'nullable|string|max:255',

            'businessIndustry'      => 'required|array|min:1',
            'businessIndustry.*'    => Rule::in(array_keys(CompanyProfile::INDUSTRY_SECTORS)),
            'otherBusinessIndustry' => [Rule::requiredIf(in_array('other', (array) $request->input('businessIndustry'), true)), 'nullable', 'string', 'max:255'],
            'numOfBranches'         => 'required|integer|min:0|max:100000',
            'numOfEmployee'         => ['required', Rule::in(array_keys(CompanyProfile::EMPLOYEE_RANGES))],

            'requestType'           => ['required', Rule::in(array_keys(CompanyProfile::REQUEST_TYPES))],
            'existingSystem'        => 'nullable|required_if:requestType,substitution|string|max:255',
            'otherRequestType'      => 'nullable|required_if:requestType,other|string|max:255',
            'password'              => 'required|string|min:8|confirmed',
        ], $this->contactMessages() + [
            'otherBusinessGroup.required'    => 'Please specify your organizational structure.',
            'businessGroup.required'         => 'Select at least one organizational structure.',
            'otherBusinessType.required'     => 'Please specify your nature of business.',
            'otherBusinessIndustry.required' => 'Please specify your industry sector.',
            'existingSystem.required_if'     => 'Please name the system you are replacing.',
            'otherRequestType.required_if'   => 'Please specify your request type.',
            'businessType.required'          => 'Select at least one nature of business.',
            'businessIndustry.required'      => 'Select at least one industry sector.',
            'countryName.in'                 => 'Please choose a country from the list.',
        ]);

        [$firstName, $lastName] = array_pad(explode(' ', trim($validated['contactName']), 2), 2, null);

        $profile = [
            'companyName'           => $validated['companyName'],
            'phoneNum'              => $validated['companyPhone'],
            'contactPhone'          => $validated['contactPhone'],
            'firstName'             => $firstName,
            'lastName'              => $lastName,
            'title'                 => $validated['title'],
            'email'                 => $validated['email'],
            'countryName'           => $validated['countryName'],
            'city'                  => $validated['city'],
            'businessGroup'         => $validated['businessGroup'],
            'otherBusinessGroup'    => $validated['otherBusinessGroup'] ?? null,
            'businessType'          => $validated['businessType'],
            'otherBusinessType'     => $validated['otherBusinessType'] ?? null,
            'goodService'           => $validated['goodService'] ?? null,
            'businessIndustry'      => $validated['businessIndustry'],
            'otherBusinessIndustry' => $validated['otherBusinessIndustry'] ?? null,
            'numOfBranches'         => (int) $validated['numOfBranches'],
            'numOfEmployee'         => $validated['numOfEmployee'],
            'requestType'           => $validated['requestType'],
            'existingSystem'        => $validated['existingSystem'] ?? null,
            'otherRequestType'      => $validated['otherRequestType'] ?? null,
            'password'              => bcrypt($validated['password']),
        ];

        // finalSubmit builds the profile from these session keys.
        session()->put('signup_data', $profile);

        // A plan picked on the pricing section skips the plan-selection step.
        if (session('selected_package')) {
            return redirect()->route('DrongoERP.finalSubmit');
        }

        return redirect()->route('DrongoERP.choosePackage');
    }

    public function submitChosenPackage($package) {
        $slug = PackageCatalog::slugForName($package) ?? abort(404);
        $plan = PackageCatalog::plans()[$slug];

        session([
            'selected_package' => $plan['name'],
            'total_amount' => ['package' => $plan['name'], 'currency' => config('packages.base_currency'), 'monthly' => $plan['price'], 'modules' => []],
        ]);

        return redirect()->route('DrongoERP.finalSubmit');
    }

    // Old "See more" links: open the package page instead.
    public function submitSeeMore($package){
        $slug = PackageCatalog::slugForName($package) ?? abort(404);

        return redirect()->route('DrongoERP.package', $slug);
    }

    // Finishing the Get Started form is the only way to sign up: it creates the
    // dashboard login (a Jetstream user) together with the company profile.
    public function finalSubmit(){
        $signupData = session('signup_data');

        // Refreshing or revisiting this URL after sign-up must not create the account twice.
        if (empty($signupData)) {
            return auth()->check()
                ? redirect()->route('DrongoERP.finalPage')
                : redirect()->route('DrongoERP.getStarted');
        }

        $password = Arr::pull($signupData, 'password');

        if (User::where('email', $signupData['email'])->exists()) {
            session()->forget('signup_data');

            return redirect()->route('login')
                ->with('status', 'An account with this email already exists. Please log in.');
        }

        // A plan picked straight from the pricing section has no module selection: bill its list price.
        if (session('selected_package') && !session('total_amount')) {
            $slug = PackageCatalog::slugForName(session('selected_package'));
            session(['total_amount' => [
                'package'  => session('selected_package'),
                'currency' => config('packages.base_currency'),
                'monthly'  => $slug ? PackageCatalog::plans()[$slug]['price'] : null,
                'modules'  => [],
            ]]);
        }

        $user = DB::transaction(function () use ($signupData, $password) {
            $user = User::create([
                'name'     => trim($signupData['firstName'] . ' ' . $signupData['lastName']),
                'email'    => $signupData['email'],
                'password' => $password, // already hashed in submitGetStarted
            ]);

            // Plans priced on request start as a request for the sales team, as they do after sign-up.
            $slug = PackageCatalog::slugForName(session('selected_package'));
            $plan = $slug ? PackageCatalog::plans()[$slug] : null;
            $choice = !$plan ? [] : ($plan['price'] === null
                ? ['requestedPackage' => $plan['name'], 'requestedAmount' => session('total_amount'), 'upgradeRequestedAt' => now()]
                : ['selectedPackage' => $plan['name'], 'totalAmount' => session('total_amount')]);

            $user->companyProfile()->create($signupData + $choice);

            return $user;
        });

        session()->forget('signup_data');
        // Email verification disabled for now. Re-enable: sends the verification link and locks the dashboard until it's clicked.
        // event(new Registered($user));
        Auth::login($user);
        request()->session()->regenerate();

        return redirect()->route('DrongoERP.finalPage');
    }
}




