@extends('layout/mainlayout')

@php
    use App\Models\CompanyProfile;

    $steps = ['Company & Contact', 'Business Profile', 'Industry & Size', 'Request & Account'];

    // Which step each field lives on, so a server-side error reopens the right step.
    $fieldSteps = [
        1 => ['companyName', 'companyPhone', 'contactName', 'title', 'email', 'contactPhone'],
        2 => ['countryName', 'city', 'businessGroup', 'otherBusinessGroup', 'businessType', 'otherBusinessType', 'goodService'],
        3 => ['businessIndustry', 'otherBusinessIndustry', 'numOfBranches', 'numOfEmployee'],
        4 => ['requestType', 'existingSystem', 'otherRequestType', 'password'],
    ];
    $startStep = 1;
    foreach ($fieldSteps as $step => $fields) {
        foreach ($fields as $field) {
            if ($errors->has($field) || $errors->has($field . '.*')) {
                $startStep = $step;
                break 2;
            }
        }
    }
@endphp

@section('page-content')
<section class="gs-page">
    <img class="gs-swirl gs-swirl--tl" src="{{ asset('/images/getstarted/swirl.svg') }}" alt="">
    <img class="gs-swirl gs-swirl--tr" src="{{ asset('/images/getstarted/swirl.svg') }}" alt="">
    <img class="gs-swirl gs-swirl--bl" src="{{ asset('/images/getstarted/swirl.svg') }}" alt="">
    <img class="gs-swirl gs-swirl--br" src="{{ asset('/images/getstarted/swirl.svg') }}" alt="">
    <img class="gs-watermark" src="{{ asset('/images/favicon.svg') }}" alt="">

    <div class="gs-sheet">
        <header class="gs-head">
            <div class="gs-logo"><img src="{{ asset('/images/favicon.svg') }}" alt="DrongoERP"></div>
            <h1>DrongoERP</h1>
            <p class="gs-tagline">Convenience at your fingertips!</p>
            <p class="gs-welcome"><strong>Welcome to DrongoERP!</strong> We’re excited to partner with you on transforming your business. This form gathers essential information to customize your ERP system, helping you streamline operations, boost efficiency, and achieve sustainable growth.</p>
            <p class="gs-journey">Let’s embark on this exciting journey together toward achieving your business goals!</p>
        </header>

        @if ($selectedPackage)
            <div class="gs-plan">
                <span>Selected plan: <strong>{{ $selectedPackage }}</strong> &middot; free trial</span>
                <a href="{{ route('DrongoERP.home') }}#pricing">Change plan</a>
            </div>
        @endif

        <ol class="gs-stepper" aria-label="Form progress">
            @foreach ($steps as $i => $label)
                <li class="gs-stepper__item" data-step-indicator="{{ $i + 1 }}">
                    <span class="gs-stepper__dot">{{ $i + 1 }}</span>
                    <span class="gs-stepper__label">{{ $label }}</span>
                </li>
            @endforeach
            <li class="gs-stepper__item">
                <span class="gs-stepper__dot">{{ count($steps) + 1 }}</span>
                <span class="gs-stepper__label">Choose Plan</span>
            </li>
        </ol>

        <form id="gs-form" action="{{ route('form.submitGetStarted') }}" method="POST" novalidate data-start-step="{{ $startStep }}">
            @csrf

            {{-- Step 1 --}}
            <div class="gs-step" data-step="1">
                <h2 class="gs-section-title">Company Information</h2>
                <div class="gs-row">
                    <div class="gs-field gs-col-8 @error('companyName') is-invalid @enderror">
                        <label for="companyName">Company Name</label>
                        <input type="text" id="companyName" name="companyName" value="{{ old('companyName') }}" required maxlength="255" autocomplete="organization">
                        <p class="gs-error">@error('companyName'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-4 @error('companyPhone') is-invalid @enderror">
                        <label for="companyPhone">Company Phone#</label>
                        <input type="tel" id="companyPhone" name="companyPhone" value="{{ old('companyPhone') }}" required data-phone placeholder="+251 9X XXX XXXX">
                        <p class="gs-error">@error('companyPhone'){{ $message }}@enderror</p>
                    </div>
                </div>

                <h2 class="gs-section-title">Contact Information</h2>
                <div class="gs-row">
                    <div class="gs-field gs-col-8 @error('contactName') is-invalid @enderror">
                        <label for="contactName">Contact Name</label>
                        <input type="text" id="contactName" name="contactName" value="{{ old('contactName') }}" required maxlength="255" autocomplete="name">
                        <p class="gs-error">@error('contactName'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-4 @error('title') is-invalid @enderror">
                        <label for="title">Title / Role</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="255" autocomplete="organization-title">
                        <p class="gs-error">@error('title'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-8 @error('email') is-invalid @enderror">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="255" autocomplete="email">
                        <p class="gs-error">@error('email'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-4 @error('contactPhone') is-invalid @enderror">
                        <label for="contactPhone">Contact Phone#</label>
                        <input type="tel" id="contactPhone" name="contactPhone" value="{{ old('contactPhone') }}" required data-phone placeholder="+251 9X XXX XXXX" autocomplete="tel">
                        <p class="gs-error">@error('contactPhone'){{ $message }}@enderror</p>
                    </div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="gs-step" data-step="2">
                <h2 class="gs-section-title">Business Information</h2>
                <div class="gs-row">
                    <div class="gs-field gs-col-8 @error('countryName') is-invalid @enderror">
                        <label for="countryName">Country of Operation</label>
                        <input type="text" id="countryName" name="countryName" value="{{ old('countryName', 'Ethiopia') }}" required maxlength="255" autocomplete="country-name">
                        <p class="gs-error">@error('countryName'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-4 @error('city') is-invalid @enderror">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}" required maxlength="255" autocomplete="address-level2">
                        <p class="gs-error">@error('city'){{ $message }}@enderror</p>
                    </div>
                </div>

                <fieldset class="gs-field gs-group @error('businessGroup') is-invalid @enderror @error('otherBusinessGroup') is-invalid @enderror" data-group="businessGroup" data-required>
                    <legend>Organizational Structure <em>(What is the legal ownership structure of your business?)</em></legend>
                    <div class="gs-options">
                        @foreach (CompanyProfile::ORGANIZATIONAL_STRUCTURES as $value => $label)
                            <label class="gs-option">
                                <input type="radio" name="businessGroup" value="{{ $value }}" @checked(old('businessGroup') === $value) @if ($value === 'other') data-other="otherBusinessGroup" @endif>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                        <input type="text" class="gs-other" id="otherBusinessGroup" name="otherBusinessGroup" value="{{ old('otherBusinessGroup') }}" placeholder="Please specify" maxlength="255" aria-label="Other organizational structure">
                    </div>
                    <p class="gs-error">{{ $errors->first('businessGroup') ?: $errors->first('otherBusinessGroup') }}</p>
                </fieldset>

                <fieldset class="gs-field gs-group @error('businessType') is-invalid @enderror @error('otherBusinessType') is-invalid @enderror" data-group="businessType[]" data-required>
                    <legend>Nature of Business <em>(What does your business do? Select all that apply.)</em></legend>
                    <div class="gs-options">
                        @foreach (CompanyProfile::NATURES_OF_BUSINESS as $value => $label)
                            <label class="gs-option">
                                <input type="checkbox" name="businessType[]" value="{{ $value }}" @checked(in_array($value, (array) old('businessType', []), true)) @if ($value === 'other') data-other="otherBusinessType" @endif>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                        <input type="text" class="gs-other" id="otherBusinessType" name="otherBusinessType" value="{{ old('otherBusinessType') }}" placeholder="Please specify" maxlength="255" aria-label="Other nature of business">
                    </div>
                    <p class="gs-error">{{ $errors->first('businessType') ?: $errors->first('otherBusinessType') }}</p>
                </fieldset>

                <div class="gs-field @error('goodService') is-invalid @enderror">
                    <label for="goodService">What type of goods or services does your company provide? <em>(Please specify)</em></label>
                    <input type="text" id="goodService" name="goodService" value="{{ old('goodService') }}" required maxlength="255">
                    <p class="gs-error">@error('goodService'){{ $message }}@enderror</p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="gs-step" data-step="3">
                <h2 class="gs-section-title">Industry &amp; Size</h2>
                <fieldset class="gs-field gs-group @error('businessIndustry') is-invalid @enderror @error('otherBusinessIndustry') is-invalid @enderror" data-group="businessIndustry[]" data-required>
                    <legend>Industry Sector <em>(Which industry does the business operate in?)</em></legend>
                    <div class="gs-options gs-options--grid">
                        @foreach (CompanyProfile::INDUSTRY_SECTORS as $value => $label)
                            <label class="gs-option">
                                <input type="checkbox" name="businessIndustry[]" value="{{ $value }}" @checked(in_array($value, (array) old('businessIndustry', []), true)) @if ($value === 'other') data-other="otherBusinessIndustry" @endif>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    <input type="text" class="gs-other" id="otherBusinessIndustry" name="otherBusinessIndustry" value="{{ old('otherBusinessIndustry') }}" placeholder="Please specify your industry" maxlength="255" aria-label="Other industry sector">
                    <p class="gs-error">{{ $errors->first('businessIndustry') ?: $errors->first('otherBusinessIndustry') }}</p>
                </fieldset>

                <div class="gs-row">
                    <div class="gs-field gs-col-3 @error('numOfBranches') is-invalid @enderror">
                        <label for="numOfBranches">Number of Branches</label>
                        <input type="number" id="numOfBranches" name="numOfBranches" value="{{ old('numOfBranches') }}" required min="0" max="100000" step="1" inputmode="numeric">
                        <p class="gs-error">@error('numOfBranches'){{ $message }}@enderror</p>
                    </div>
                    <fieldset class="gs-field gs-group gs-col-9 @error('numOfEmployee') is-invalid @enderror" data-group="numOfEmployee" data-required>
                        <legend>Number of Employees <em>(Select the appropriate range)</em></legend>
                        <div class="gs-options">
                            @foreach (CompanyProfile::EMPLOYEE_RANGES as $value => $label)
                                <label class="gs-option">
                                    <input type="radio" name="numOfEmployee" value="{{ $value }}" @checked(old('numOfEmployee') === $value)>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        <p class="gs-error">@error('numOfEmployee'){{ $message }}@enderror</p>
                    </fieldset>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="gs-step" data-step="4">
                <h2 class="gs-section-title">Request Type</h2>
                <fieldset class="gs-field gs-group @error('requestType') is-invalid @enderror @error('existingSystem') is-invalid @enderror @error('otherRequestType') is-invalid @enderror" data-group="requestType" data-required>
                    <legend>Request Type <em>(Select only one request type. A new request form is required for each request type.)</em></legend>
                    <div class="gs-options">
                        @foreach (CompanyProfile::REQUEST_TYPES as $value => $label)
                            <label class="gs-option">
                                <input type="radio" name="requestType" value="{{ $value }}" @checked(old('requestType', 'newSystem') === $value)
                                    @if ($value === 'substitution') data-other="existingSystem" @elseif ($value === 'other') data-other="otherRequestType" @endif>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    <input type="text" class="gs-other" id="existingSystem" name="existingSystem" value="{{ old('existingSystem') }}" placeholder="Which system are you replacing?" maxlength="255" aria-label="Existing system">
                    <input type="text" class="gs-other" id="otherRequestType" name="otherRequestType" value="{{ old('otherRequestType') }}" placeholder="Please specify your request" maxlength="255" aria-label="Other request type">
                    <p class="gs-error">{{ $errors->first('requestType') ?: ($errors->first('existingSystem') ?: $errors->first('otherRequestType')) }}</p>
                </fieldset>

                <h2 class="gs-section-title">Create Your Account</h2>
                <div class="gs-row">
                    <div class="gs-field gs-col-6 @error('password') is-invalid @enderror">
                        <label for="password">Password <em>(at least 8 characters)</em></label>
                        <input type="password" id="password" name="password" required minlength="8" autocomplete="new-password">
                        <p class="gs-error">@error('password'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required data-match="password" autocomplete="new-password">
                        <p class="gs-error"></p>
                    </div>
                </div>
            </div>

            <div class="gs-actions">
                <button type="button" class="gs-btn gs-btn--ghost" data-prev>Previous</button>
                <span class="gs-progress" aria-live="polite"></span>
                <button type="button" class="zubuz-default-btn pill gs-btn" data-next><span>Next</span></button>
                <button type="submit" class="zubuz-default-btn pill gs-btn" data-submit><span>{{ $selectedPackage ? 'Submit' : 'Continue to plans' }}</span></button>
            </div>
        </form>

        <footer class="gs-contact">
            <a href="mailto:contact@drongoerp.com"><img src="{{ asset('/images/icon/email.svg') }}" alt="">contact@drongoerp.com / info@drongoerp.com</a>
            <a href="tel:+251907778899"><img src="{{ asset('/images/icon/call.svg') }}" alt="">+251 90 777 8899 / +251 90 877 8899</a>
            <a href="https://maps.app.goo.gl/zpgJ9N7XVS5oStmG9" target="_blank" rel="noopener"><img src="{{ asset('/images/icon/map.svg') }}" alt="">Gulf Aziz Bldg., Namibia Street, Bole, Addis Ababa</a>
        </footer>
    </div>
</section>

<script>
(function () {
    const form = document.getElementById('gs-form');
    const steps = Array.from(form.querySelectorAll('.gs-step'));
    const indicators = document.querySelectorAll('[data-step-indicator]');
    const prevBtn = form.querySelector('[data-prev]');
    const nextBtn = form.querySelector('[data-next]');
    const submitBtn = form.querySelector('[data-submit]');
    const progress = form.querySelector('.gs-progress');
    const phonePattern = /^\+?[0-9\s\-()]{7,20}$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let current = parseInt(form.dataset.startStep, 10) || 1;

    function show(step) {
        current = step;
        steps.forEach(s => s.classList.toggle('is-active', +s.dataset.step === step));
        indicators.forEach(i => {
            const n = +i.dataset.stepIndicator;
            i.classList.toggle('is-active', n === step);
            i.classList.toggle('is-done', n < step);
        });
        prevBtn.style.visibility = step === 1 ? 'hidden' : 'visible';
        nextBtn.hidden = step === steps.length;
        submitBtn.hidden = step !== steps.length;
        const label = indicators[step - 1].querySelector('.gs-stepper__label').textContent;
        progress.textContent = 'Step ' + step + ' of ' + steps.length + ' · ' + label;
    }

    function setError(field, message) {
        field.classList.toggle('is-invalid', !!message);
        const slot = field.querySelector('.gs-error');
        if (slot) slot.textContent = message || '';
        return !message;
    }

    // "Other" style choices reveal and require their linked text box.
    function syncOthers() {
        form.querySelectorAll('[data-other]').forEach(choice => {
            const box = document.getElementById(choice.dataset.other);
            box.classList.toggle('is-shown', choice.checked);
            box.required = choice.checked;
        });
    }

    function checkInput(input) {
        const v = input.value.trim();
        if (input.required && !v) return 'This field is required.';
        if (!v) return '';
        if (input.type === 'email' && !emailPattern.test(v)) return 'Please enter a valid email address.';
        if (input.hasAttribute('data-phone') && !phonePattern.test(v)) return 'Please enter a valid phone number.';
        if (input.type === 'number' && (!/^\d+$/.test(v) || +v < +input.min || +v > +input.max)) return 'Please enter a whole number.';
        if (input.minLength > 0 && v.length < input.minLength) return 'Must be at least ' + input.minLength + ' characters.';
        if (input.dataset.match && v !== form.elements[input.dataset.match].value.trim()) return 'Passwords do not match.';
        return '';
    }

    function validateStep(step) {
        const root = steps[step - 1];
        let ok = true;

        root.querySelectorAll('.gs-field:not(.gs-group) input').forEach(input => {
            ok = setError(input.closest('.gs-field'), checkInput(input)) && ok;
        });

        root.querySelectorAll('.gs-group').forEach(group => {
            const choices = group.querySelectorAll('input[name="' + group.dataset.group + '"]');
            let message = '';
            if (group.hasAttribute('data-required') && !Array.from(choices).some(c => c.checked)) {
                message = choices[0].type === 'checkbox' ? 'Select at least one option.' : 'Please select an option.';
            } else {
                group.querySelectorAll('.gs-other.is-shown').forEach(box => {
                    if (!message && !box.value.trim()) message = 'Please specify.';
                });
            }
            ok = setError(group, message) && ok;
        });

        if (!ok) {
            const first = root.querySelector('.is-invalid');
            first.scrollIntoView({ behavior: 'smooth', block: 'center' });
            const focusable = first.querySelector('input:not([type=radio]):not([type=checkbox])') || first.querySelector('input');
            if (focusable) focusable.focus({ preventScroll: true });
        }
        return ok;
    }

    nextBtn.addEventListener('click', () => {
        if (validateStep(current)) {
            show(current + 1);
            form.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    prevBtn.addEventListener('click', () => show(current - 1));

    form.addEventListener('submit', e => {
        for (let s = 1; s <= steps.length; s++) {
            if (!validateStep(s)) { e.preventDefault(); show(s); validateStep(s); return; }
        }
    });

    // Clear a field's error as soon as the user fixes it.
    form.addEventListener('input', e => {
        const field = e.target.closest('.gs-field');
        if (field && field.classList.contains('is-invalid') && !field.classList.contains('gs-group')) {
            setError(field, checkInput(e.target));
        }
    });
    form.addEventListener('change', e => {
        syncOthers();
        const group = e.target.closest('.gs-group');
        if (group && group.classList.contains('is-invalid')) setError(group, '');
    });
    // Enter in a text box moves to the next step instead of submitting early.
    form.addEventListener('keydown', e => {
        if (e.key === 'Enter' && e.target.tagName === 'INPUT' && current < steps.length) {
            e.preventDefault();
            nextBtn.click();
        }
    });

    syncOthers();
    show(current);
})();
</script>
@endsection
