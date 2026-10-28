@extends('layout/mainlayout')

@section('page-content')

<div class="container mt-5">
    <div class="steps">
        <div class="step active">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
    </div>
    <h2 style="text-align: center; margin: 40px 0 100px 0;">Drongo Enterprise Planning</h2>
    <h6 style="margin: 40px 20px 20px 70px;">This is a form for you our customer, to register and start setting up the DrongoERP system for your business and take the next step in your glorious business journey. </h6>

    @php
        $selectedBusinessGroups = (array) old('businessGroup', session('form_answers.businessGroup', []));
    @endphp
    
    <form method="POST" action="{{ route('form.create') }}" enctype="multipart/form-data" id="companyProfileForm"> 
    @csrf 
        <div class="wrapper">
            <!-- Company Information Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Company Form</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-7">
                            <label for="companyName" class="form-label">Company Name *</label>
                            <input type="text" class="form-control" id="companyName" name="companyName" value="{{ old('companyName', session('form_answers.companyName')) }}" placeholder="Enter company name" >
                            @error('companyName')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="col-12 col-md-5">
                            <label for="companyPhoneNum" class="form-label">Company Phone Number *</label>
                            <input type="text" class="form-control" id="companyPhoneNum" name="companyPhoneNum" value="{{ old('companyPhoneNum', session('form_answers.companyPhoneNum'))}}" placeholder="Enter company phone number" >
                            @error('companyPhoneNum')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-12 col-md-5">
                            <label for="companyPhoneNum" class="form-label">Company Phone Number *</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="companyPhoneNum" 
                                name="companyPhoneNum" 
                                value="{{ old('companyPhoneNum', session('form_answers.companyPhoneNum'))}}" 
                                placeholder="+251 XX XXX XXXX" 
                                pattern="\+2519\d{8}" 
                                title="Phone number must start with +251 and be followed by 9 digits"
                                required
                            >
                            @error('companyPhoneNum')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div> --}} 
                        <div class="col-12 col-md-5">
                            <label for="companyPhoneNum" class="form-label">Company Phone Number *</label>
                            <div class="input-group">
                                <span class="input-group-text">+251</span>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="companyPhoneNum" 
                                    name="companyPhoneNum" 
                                    value="{{ old('companyPhoneNum', session('form_answers.companyPhoneNum'))}}" 
                                    placeholder="XX XXX XXXX" 
                                    pattern="\d{9}" 
                                    title="Enter exactly 9 digits after +251" 
                                    maxlength="9" 
                                    inputmode="numeric" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"                        
                                    required
                                >
                            </div>
                            @error('companyPhoneNum')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        

                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Contact Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <label for="contactName" class="form-label">Contact Name *</label>
                            <input type="text" class="form-control" id="contactName" name="contactName" value="{{ old('contactName', session('form_answers.contactName'))}}" placeholder="Enter your full Name" >
                            @error('contactName')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="position" class="form-label">Title/ Position *</label>
                            <input type="text" class="form-control" id="position" name="position" value="{{old('position', session('form_answers.position'))}}" placeholder="Enter your title" >
                            @error('position')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="phoneNum" class="form-label">Phone Number *</label>
                            <input type="text" class="form-control" id="phoneNum" name="phoneNum" value="{{old('phoneNum', session('form_answers.phoneNum'))}}" placeholder="Enter your phone number" >
                            @error('phoneNum')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-7">
                            <label for="street" class="form-label">Street Address/Building *</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{old('street', session('form_answers.street'))}}" placeholder="Enter your building" >
                            @error('street')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-5">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email', session('form_answers.email'))}}" placeholder="Enter your email" >
                            @error('email')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <label for="city" class="form-label">City *</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{old('city', session('form_answers.city'))}}" placeholder="Enter your city" >
                            @error('city')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{old('state', session('form_answers.state'))}}" placeholder="Enter your state" >
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode"  name="zipCode" value="{{old('zipCode', session('form_answers.zipCode'))}}" placeholder="Enter your zip code" >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Type Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Business Type</h5>
                </div>
                <div class="card-body"> 
                    <div class="mb-3">
                        <label class="businessTypeSelect">Select Business Type(Select all that apply):</label>
                        <div class="mb-3" id="businessType" style="display: flex; flex-wrap: wrap; align-items: center; gap: 50px; margin-top:15px;">
                            <div>
                                <input type="checkbox" name="businessType[]" value="manufacturing" id="manufacturing" onclick="saveCheckboxState()">
                                <label for="manufacturing" for="businessTypeManufacturing">Manufacturing</label>
                            </div>
                            <div>
                                <input type="checkbox" name="businessType[]" value="import" id="import" onclick="saveCheckboxState()">
                                <label for="import" for="businessTypeImport">Import</label>
                            </div>
                            <div>
                                <input type="checkbox" name="businessType[]" value="export" id="export" onclick="saveCheckboxState()">
                                <label for="export" for="businessTypeExport">Export</label>
                            </div>
                            <div>
                                <input type="checkbox" name="businessType[]" value="service" id="service" onclick="saveCheckboxState()">
                                <label for="service" for="businessTypeService">Service</label>
                            </div>
                            <div>
                                <input type="checkbox" name="businessType[]" value="retail" id="retail" onclick="saveCheckboxState()">
                                <label for="retail" for="businessTypeRetail">Retail</label>
                            </div>
                            <div>
                                <input type="checkbox" name="businessType[]" value="wholesale" id="wholesale" onclick="saveCheckboxState()">
                                <label for="wholesale" for="businessTypeWholesale">Wholesale</label>
                            </div>
                        </div>
                        @error('businessType')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                        @enderror
                    </div> 
        
                    <div class="mb-3" style="margin-top:50px;">
                        <div class="form-group">
                            <label for="businessIndustry">Business Industry</label>
                            <div class="input-group">
                                <select class="form-control" id="businessIndustry" name="businessIndustry" style="padding-right: 30px; background: transparent; appearance: none;">
                                    <option style="background-color: rgb(161, 158, 158); color:white;" value="" disabled selected>Choose your business industry</option>
                                    <option value="furniture">Furniture</option>
                                    <option value="leather">Leather</option>
                                    <option value="cosmetics">Cosmetics and Pharma</option>
                                    <option value="foam">Foam and Plastic</option>
                                    <option value="light">Light and Electricity</option>
                                    <option value="automotive">Automotive and Spare Parts</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="construction">Construction and Material</option>
                                    <option value="boutique">Boutique and Garment</option>
                                    <option value="electronics">Electronics and Appliances</option>
                                    <option value="supermarket">Supermarket</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="restaurant">Restaurant and Cafe</option>
                                    <option value="liquor">Liquor Store</option>
                                    <option value="printing">Printing and Advertising</option>
                                    <option value="import_export">Import and Export</option>
                                    <option value="tour">Tour and Travel</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="school">School</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="technology">Technology</option>
                                    <option value="realEstate">Real Estate</option>
                                    <option value="food">Food and Beverage</option>
                                    <option value="consulting">Consulting</option>
                                    <option value="media">Media</option>
                                    <option value="research">Research and Development</option>
                                    <option value="gym">GYM</option>
                                    <option value="finance">Finance</option>
                                    <option value="otherBusinessIndustry">Other</option>
                                </select>
                                
                                <div class="input-group-append" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                    <span class="input-group-text" style="border: none; background: transparent; padding: 0;">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    
                        <div id="otherIndustryInput" style="display: none; border: 2px solid #F08109; border-radius: 8px;" class="mt-3">
                            <input type="text" class="form-control" id="otherIndustry" name="otherIndustry" value="{{old('otherIndustry', session('form_answers.otherIndustry'))}}" placeholder="Please specify your business industry">
                        </div>
                    </div> 
                     
                    <div class="mb-3" style="margin-top:50px;">
                        <label class="form-label">Business Group (Select all that apply):</label>
                        <div class="mb-3" id="businessGroup" name="businessGroup" value="{{old('businessGroup[]', session('form_answers.businessGroup[]'))}}" style="display: flex; flex-wrap: wrap; align-items: center; gap: 27px;">
                            <div>
                                <input type="checkbox" id="sole" name="businessGroup[]" value="sole"
                                {{ in_array('sole', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="sole">Sole</label>
                            </div>
                            <div>
                                <input type="checkbox" id="plc" name="businessGroup[]" value="plc"
                                {{ in_array('plc', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="plc">PLC</label>
                            </div>
                            <div>
                                <input type="checkbox" id="share" name="businessGroup[]" value="share"
                                {{ in_array('share', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="share">Share</label>
                            </div>
                            <div>
                                <input type="checkbox" id="nonProfit" name="businessGroup[]" value="nonProfit"
                                {{ in_array('nonProfit', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="nonProfit">Non-Profit</label>
                            </div>
                            <div>
                                <input type="checkbox" id="governmental" name="businessGroup[]" value="governmental"
                                {{ in_array('governmental', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="governmental">Governmental</label>
                            </div>
                            <div>
                                <input type="checkbox" id="other" name="businessGroup[]" value="other" onclick="toggleOtherInput()"
                                {{ in_array('other', $selectedBusinessGroups) ? 'checked' : '' }}>
                                <label for="other">Other</label>
                            </div>
                            <div id="otherInputContainer" style="display: none; margin-left: 10px;">
                                <input type="text" id="otherBusinessGroup" name="otherBusinessGroup" class="form-control" style="width: 350px; border: none;" placeholder="Please specify your business group">
                            </div> 
                        </div>           
                    </div>
                    
                </div>
            </div>

            <!-- Country of Operation -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Country of Operation</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="numOfCountry" class="form-label">Number of Countries</label>
                            <input type="number" class="form-control" id="numOfCountry" name="numOfCountry" value="{{old('numOfCountry', session('form_answers.numOfCountry'))}}" placeholder="Enter number of countries" min="0">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="countryName" class="form-label">Country Names</label>
                            <input type="text" class="form-control" id="countryName" name="countryName" value="{{old('countryName', session('form_answers.countryName'))}}" placeholder="Enter country names" >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Branches and Employees -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Branches and Employees</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="numOfBranch" class="form-label">Number of Branches</label>
                            <input type="number" class="form-control" id="numOfBranch" name="numOfBranch" value="{{old('numOfBranch', session('form_answers.numOfBranch'))}}" placeholder="Enter number of branches" min="0">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="numOfEmployees" class="form-label">Number of Employee</label>
                            <input type="number" class="form-control" id="numOfEmployees" name="numOfEmployees" value="{{old('numOfEmployees', session('form_answers.numOfEmployees'))}}" placeholder="Enter number of employees" min="0">
                        </div>
                       
                    </div>
                    <div class="mb-3">
                        <label for="branchLocation" class="form-label">Branch Location</label>
                        <textarea class="form-control" id="branchLocation" name="branchLocation" rows="3" >{{old('branchLocation', session('form_answers.branchLocation'))}}</textarea>
                    </div>
                </div>
            </div>

            {{-- Existing System--}}
            <div class="card mb-4" id="existingSystemRow"  @if($requestType == 'newSystem') style="display: none;" @endif>
                <div class="card-header">
                    <h5>Existing System</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-12">
                            <input type="text" class="form-control" id="existingSystem" name="existingSystem" value="{{old('existingSystem', session('form_answers.existingSystem'))}}" placeholder="Enter your current system, if applicable" >
                            @error('existingSystem')
                            <p style="font-size:14px; color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;  margin-top: 100px;">

                <div class="actionBox" style="display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 8px; cursor: pointer;">
                    <i class="fas fa-caret-left "  style="font-size: 40px;"></i>
                    <a href="/requestType" class="actionButton" style="margin: 0; font-size: 20px; color: black;">Previous</a>
                </div>
            
                <div class="actionBox" style="display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 8px; cursor: pointer;">
                    <button type="submit" class="actionButton" style="font-size: 20px; border: none; background: transparent; cursor: pointer;">Next</button>
                    <i class="fas fa-caret-right " style="font-size: 40px;"></i>
                </div>
            
            </div>
           
        </div>
    </form> 

</div>
@endsection
