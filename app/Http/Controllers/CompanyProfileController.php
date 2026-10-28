<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\CompanyProfile;
use App\Support\PackageCatalog;

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
   
    public function submitGetStarted(Request $request){
        $phone = ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,20}$/'];

        $validated = $request->validate([
            'companyName'           => 'required|string|max:255',
            'companyPhone'          => $phone,
            'contactName'           => 'required|string|max:255',
            'title'                 => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:company_profiles,email',
            'contactPhone'          => $phone,

            'countryName'           => 'required|string|max:255',
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
        ], [
            'companyPhone.regex'             => 'Please enter a valid phone number.',
            'contactPhone.regex'             => 'Please enter a valid phone number.',
            'otherBusinessGroup.required_if' => 'Please specify your organizational structure.',
            'otherBusinessType.required'     => 'Please specify your nature of business.',
            'otherBusinessIndustry.required' => 'Please specify your industry sector.',
            'existingSystem.required_if'     => 'Please name the system you are replacing.',
            'otherRequestType.required_if'   => 'Please specify your request type.',
            'businessType.required'          => 'Select at least one nature of business.',
            'businessIndustry.required'      => 'Select at least one industry sector.',
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

    public function finalSubmit(Request $request){

        
        $companyProfileId = $request->query('companyProfile');
        session(['companyProfileId' => $companyProfileId]);

        $signupData = session()->get('signup_data', []);
        $selectedPackage = session('selected_package');
        $totalAmount = session('total_amount');


        $companyProfile = CompanyProfile::create($signupData);
        $companyProfile->selectedPackage = $selectedPackage;
        $companyProfile->totalAmount = $totalAmount;
        $companyProfile->save();
        
        if (is_array($companyProfile)) {
            $companyProfile = (object) $companyProfile; 
        }

        $accountDetails = [
            'email' => $companyProfile->email ?? null,
            'company_name' => $companyProfile->companyName ?? null,
            'password' => $companyProfile->password ?? null,
        ];

        return redirect()->route('DrongoERP.finalPage', [
            'companyProfile' => $companyProfile->id,
            'accountDetails' => $accountDetails,
        ]);
    }


}




