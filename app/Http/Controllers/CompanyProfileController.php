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

    public function createCompanyProfile(Request $request){
        try{
            $validatedData = $request->validate([
                'companyName'           => 'required|string|max:255',
                'phoneNum'              => 'required|string|max:12',
                'email'                 => 'required|email|unique:company_profiles,email',
                'firstName'             => 'required|email|max:255',
                'lastName'              => 'required|email|max:255',
                'title'                 => 'required|string|max:255',
                'countryName'               => 'required|string|max:20',
                'requestType'           => 'required|string|max:255',
                'existingSystem'        => 'nullable|string|max:255',

                'businessType'          => 'required|array',
                'otherBusinessType'     => 'nullable|string|max:255',
                'businessGroup'         => 'required|array',
                'otherBusinessGroup'    => 'nullable|string|max:255',
                'businessIndustry'      => 'required|array',
                'otherBusinessIndustry' => 'nullable|string|max:255',
                

                'street'                => 'nullable|string|max:255',
                'city'                  => 'nullable|string|max:255',
                'state'                 => 'nullable|string|max:255',
                'zipCode'               => 'nullable|string|max:10',
                'numOfCountry'          => 'nullable|integer',
                'numOfBranch'           => 'nullable|integer',
                'numOfEmployees'        => 'nullable|integer',
                'branchLocation'        => 'nullable|string|max:255',

                'password'              => 'required|string|max:255',
                'confirmPassword'       => 'string',

                
            ]);

        
            if ($request->has('businessType')) {
                $validatedData['businessType'] = json_encode($request->businessType);
            }
            if ($request->has('businessGroup')) {
                $validatedData['businessGroup'] = json_encode($request->businessGroup);
            }
            if ($request->has('businessIndustry')) {
                $validatedData['businessIndustry'] = json_encode($request->businessIndustry);
            } 
        
        
            $companyProfile = CompanyProfile::create($validatedData); 

            session(['companyProfileId' => $companyProfile->id]);

            session(['form_answers' => $validatedData]);

            return redirect()->route('DrongoERP.choosePlan', ['id' => $companyProfile->id])->withInput($validatedData);
        
        }
            
            catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()
                    ->withErrors($e->validator)
                    ->withInput(); 

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'An error occurred: ' . $e->getMessage());
            }
    } 
   
    // Phones are stored in international (E.164) form: + country code, then up to 14 digits.
    private function normalizePhones(Request $request): void
    {
        foreach (['companyPhone', 'contactPhone'] as $field) {
            if (is_string($request->input($field))) {
                $request->merge([$field => preg_replace('/[\s\-().]/', '', $request->input($field))]);
            }
        }
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
            'companyPhone' => $phone,
            'email'        => 'required|email|max:255|unique:company_profiles,email|unique:users,email',
            'contactPhone' => $phone,
        ];
    }

    private function contactMessages(): array
    {
        return [
            'companyPhone.regex' => 'Please enter a valid phone number with its country code, e.g. +251 911 234 567.',
            'contactPhone.regex' => 'Please enter a valid phone number with its country code, e.g. +251 911 234 567.',
            'email.unique'       => 'An account with this email already exists. Please log in instead.',
        ];
    }

    // Called by the Get Started form when leaving step 1, so taken details are flagged right away.
    public function checkContact(Request $request){
        $this->normalizePhones($request);
        $request->validate($this->contactRules(), $this->contactMessages());

        return response()->noContent();
    }

    public function submitGetStarted(Request $request){
        $this->normalizePhones($request);

        $validated =$request->validate($this->contactRules() + [
            'companyName'           => 'required|string|max:255',
            'contactName'           => 'required|string|max:255',
            'title'                 => 'required|string|max:255',

            'countryName'           => ['required', Rule::in(Geo::countryNames())],
            'city'                  => 'required|string|max:255',
            'businessGroup'         => ['required', Rule::in(array_keys(CompanyProfile::ORGANIZATIONAL_STRUCTURES))],
            'otherBusinessGroup'    => 'nullable|required_if:businessGroup,other|string|max:255',
            'businessType'          => 'required|array|min:1',
            'businessType.*'        => Rule::in(array_keys(CompanyProfile::NATURES_OF_BUSINESS)),
            'otherBusinessType'     => [Rule::requiredIf(in_array('other', (array) $request->input('businessType'), true)), 'nullable', 'string', 'max:255'],
            'goodService'           => 'required|string|max:255',

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
            'otherBusinessGroup.required_if' => 'Please specify your organizational structure.',
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
            'businessGroup'         => [$validated['businessGroup']],
            'otherBusinessGroup'    => $validated['otherBusinessGroup'] ?? null,
            'businessType'          => $validated['businessType'],
            'otherBusinessType'     => $validated['otherBusinessType'] ?? null,
            'goodService'           => $validated['goodService'],
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

        return redirect()->route('DrongoERP.choosePlan');
    }

    public function submitChosenPackage($package) {
        $slug = PackageCatalog::slugForName($package);
        $price = $slug ? PackageCatalog::plans()[$slug]['price'] : 0;

        session([
            'selected_package' => $package,
            'total_amount' => ['package' => $package, 'currency' => config('packages.base_currency'), 'monthly' => $price, 'modules' => []],
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

            $user->companyProfile()->create($signupData + [
                'selectedPackage' => session('selected_package'),
                'totalAmount'     => session('total_amount'),
            ]);

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




