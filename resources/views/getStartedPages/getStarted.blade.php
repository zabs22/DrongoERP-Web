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
<link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/css/intlTelInput.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/tom-select/tom-select.min.css') }}">
<style>
    /* International phone picker (intl-tel-input), fitted to the form's underlined inputs. */
    .gs-field .iti { display: block; width: 100%; }
    .gs-field .iti__country-container { top: 0; bottom: 1px; }
    .gs-field .iti__selected-country { background: transparent !important; padding: 0 !important; }
    .gs-field .iti__selected-country-primary { padding: 0 6px 0 0; }
    .gs-field .iti__selected-dial-code { margin-left: 0; padding-right: 8px; border-right: 1px solid var(--light-color); font-size: 16px; line-height: 24px; color: var(--heading-color); }
    .gs-field .iti__dropdown-content { z-index: 20; }

    /* Country and city dropdowns (Tom Select), styled like the other underlined fields. */
    .gs-page .gs-field .ts-control { border: 0; border-bottom: 1px solid var(--light-color); border-radius: 0; padding: 6px 24px 6px 0; min-height: 37px; background: transparent; box-shadow: none; font-size: 16px; line-height: 24px; color: var(--heading-color); }
    .gs-page .gs-field .ts-wrapper.focus .ts-control { border-bottom-color: var(--yellow-bg); box-shadow: none; }
    .gs-page .gs-field .ts-control input { border: 0 !important; padding: 0 !important; width: auto !important; min-width: 7rem; font-size: 16px; line-height: 24px; }
    .gs-page .gs-field .ts-control input::placeholder { color: #b5b5b5; }
    .gs-page .gs-field .ts-wrapper.single .ts-control::after { right: 4px; border-color: #8a8a8a transparent transparent; }
    .gs-page .gs-field .ts-dropdown { z-index: 20; margin-top: 4px; border: 1px solid #eee; border-radius: 8px; box-shadow: 0 12px 30px rgba(0, 0, 0, .12); font-size: 15px; }
    .gs-page .gs-field .ts-dropdown .option, .gs-page .gs-field .ts-dropdown .create, .gs-page .gs-field .ts-dropdown .no-results { padding: 8px 12px; }
    .gs-page .gs-field .ts-dropdown .active { background: rgba(240, 129, 9, .1); color: var(--heading-color); }
    .gs-ts-country { display: flex; align-items: center; gap: 10px; }
    .gs-ts-country .iti__flag { margin: 0; flex: 0 0 auto; }
    .iti { --iti-path-flags-1x: url('{{ asset('vendor/intl-tel-input/img/flags.webp') }}'); --iti-path-flags-2x: url('{{ asset('vendor/intl-tel-input/img/flags@2x.webp') }}'); }
</style>
<script src="{{ asset('vendor/intl-tel-input/js/intlTelInputWithUtils.min.js') }}"></script>
<script src="{{ asset('vendor/tom-select/tom-select.complete.min.js') }}"></script>
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

        <form id="gs-form" action="{{ route('form.submitGetStarted') }}" method="POST" novalidate data-start-step="{{ $startStep }}" data-check-url="{{ route('form.checkContact') }}">
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
                        <input type="tel" id="companyPhone" name="companyPhone" value="{{ old('companyPhone') }}" required data-phone autocomplete="tel">
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
                        <input type="tel" id="contactPhone" name="contactPhone" value="{{ old('contactPhone') }}" required data-phone autocomplete="tel">
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
                        <select id="countryName" name="countryName" required data-country>
                            @foreach (\App\Support\Geo::countries() as $country)
                                <option value="{{ $country['name'] }}" data-code="{{ $country['code'] }}" @selected(old('countryName', 'Ethiopia') === $country['name'])>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        <p class="gs-error">@error('countryName'){{ $message }}@enderror</p>
                    </div>
                    <div class="gs-field gs-col-4 @error('city') is-invalid @enderror">
                        <label for="city">City</label>
                        <select id="city" name="city" required data-city data-url="{{ route('DrongoERP.cities', 'XX') }}">
                            <option value="">Search or type your city</option>
                            @if (old('city'))
                                <option value="{{ old('city') }}" selected>{{ old('city') }}</option>
                            @endif
                        </select>
                        <p class="gs-error">@error('city'){{ $message }}@enderror</p>
                    </div>
                </div>

                <fieldset class="gs-field gs-group @error('businessGroup') is-invalid @enderror @error('otherBusinessGroup') is-invalid @enderror" data-group="businessGroup[]" data-required>
                    <legend>Organizational Structure <em>(What is the legal ownership structure of your business? Select all that apply.)</em></legend>
                    <div class="gs-options">
                        @foreach (CompanyProfile::ORGANIZATIONAL_STRUCTURES as $value => $label)
                            <label class="gs-option">
                                <input type="checkbox" name="businessGroup[]" value="{{ $value }}" @checked(in_array($value, (array) old('businessGroup', []), true)) @if ($value === 'other') data-other="otherBusinessGroup" @endif>
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
    // Each phone field gets a country picker; numbers are checked against that country's rules.
    const phones = new Map();
    // The theme forces input padding with !important, which hides the text under the flag and
    // dial code; re-apply the picker's left padding with the same weight whenever the country changes.
    function fitPhone(input) {
        const box = input.closest('.iti').querySelector('.iti__country-container');
        input.style.setProperty('padding-left', (box.offsetWidth + 10) + 'px', 'important');
    }
    form.querySelectorAll('[data-phone]').forEach(input => {
        phones.set(input, window.intlTelInput(input, {
            initialCountry: 'et',
            countryOrder: ['et', 'ke', 'dj', 'so', 'sd', 'ae', 'sa', 'us', 'gb'],
            separateDialCode: true,
            strictMode: true,
        }));
        fitPhone(input);
        input.addEventListener('countrychange', () => fitPhone(input));
    });

    // Country: searchable list with flags. City: that country's cities, or any name typed in
    // (the city lists miss smaller towns).
    const countrySelect = form.querySelector('[data-country]');
    const citySelect = form.querySelector('[data-city]');
    const flag = code => '<span class="iti__flag iti__' + code.toLowerCase() + '"></span>';
    const countryPicker = new TomSelect(countrySelect, {
        maxOptions: null,
        render: {
            option: (d, esc) => '<div class="gs-ts-country">' + flag(d.code) + esc(d.text) + '</div>',
            item: (d, esc) => '<div class="gs-ts-country">' + flag(d.code) + esc(d.text) + '</div>',
        },
    });
    const cityPicker = new TomSelect(citySelect, {
        create: true,
        createOnBlur: true,
        persist: false,
        maxOptions: 100,
        placeholder: 'Search or type your city',
        render: {
            option_create: (d, esc) => '<div class="create">Use “' + esc(d.input) + '”</div>',
            no_results: () => '<div class="no-results">No match — keep typing to use your own</div>',
        },
    });

    function loadCities(keepCurrent) {
        const code = countryPicker.options[countryPicker.getValue()]?.code;
        const current = cityPicker.getValue();
        cityPicker.clearOptions();
        if (!keepCurrent) cityPicker.clear(true);
        if (!code) return;
        fetch(citySelect.dataset.url.replace('XX', code))
            .then(r => r.ok ? r.json() : [])
            .then(names => {
                cityPicker.addOptions(names.map(n => ({ value: n, text: n })));
                if (keepCurrent && current) {
                    cityPicker.addOption({ value: current, text: current });
                    cityPicker.setValue(current, true);
                }
            })
            .catch(() => {});
    }
    countryPicker.on('change', () => loadCities(false));
    loadCities(true);
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let current = parseInt(form.dataset.startStep, 10) || 1;

    function show(step) {
        current = step;
        steps.forEach(s => s.classList.toggle('is-active', +s.dataset.step === step));
        phones.forEach((iti, input) => fitPhone(input)); // hidden steps measure 0 wide
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
        if (phones.has(input) && !phones.get(input).isValidNumber()) return 'Please enter a valid phone number for the selected country.';
        if (input.type === 'number' && (!/^\d+$/.test(v) || +v < +input.min || +v > +input.max)) return 'Please enter a whole number.';
        if (input.minLength > 0 && v.length < input.minLength) return 'Must be at least ' + input.minLength + ' characters.';
        if (input.dataset.match && v !== form.elements[input.dataset.match].value.trim()) return 'Passwords do not match.';
        return '';
    }

    function validateStep(step) {
        const root = steps[step - 1];
        let ok = true;

        // Dropdowns are checked through their <select>, not their search box.
        root.querySelectorAll('.gs-field:not(.gs-group) input, .gs-field:not(.gs-group) select').forEach(input => {
            if (input.closest('.ts-wrapper')) return;
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

    // Ask the server whether these step 1 details already belong to an account; resolves to
    // { field: [message] }. If the check itself fails (offline, rate limit), report nothing:
    // the final submit checks again.
    function fetchTaken(data) {
        const body = new FormData();
        Object.entries(data).forEach(([name, value]) => body.append(name, value));
        return fetch(form.dataset.checkUrl, {
            method: 'POST',
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': form.elements._token.value },
            body,
        }).then(r => r.status === 422 ? r.json() : {}).then(d => d.errors || {}).catch(() => ({}));
    }

    function checkTaken() {
        const data = { companyName: form.elements.companyName.value.trim(), email: form.elements.email.value.trim() };
        phones.forEach((iti, input) => { data[input.name] = iti.getNumber(); });
        return fetchTaken(data).then(errors => {
            Object.entries(errors).forEach(([name, messages]) => {
                setError(form.elements[name].closest('.gs-field'), messages[0]);
            });
            const first = steps[0].querySelector('.is-invalid');
            if (first) first.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return !first;
        });
    }

    // Company name and email are first checked when the user leaves the box; after that they are
    // re-checked as the user types (once they pause), so a fix clears the error straight away.
    ['companyName', 'email'].forEach(name => {
        const input = form.elements[name];
        const field = input.closest('.gs-field');
        let timer, touched = false;
        function check() {
            const value = input.value.trim();
            const message = checkInput(input);
            if (message) return setError(field, message);
            fetchTaken({ [name]: value }).then(errors => {
                if (input.value.trim() === value) setError(field, errors[name] ? errors[name][0] : '');
            });
        }
        input.addEventListener('blur', () => { touched = true; clearTimeout(timer); check(); });
        input.addEventListener('input', () => {
            clearTimeout(timer);
            if (touched) timer = setTimeout(check, 500);
        });
    });

    nextBtn.addEventListener('click', async () => {
        if (!validateStep(current)) return;
        if (current === 1) {
            nextBtn.disabled = true;
            const ok = await checkTaken();
            nextBtn.disabled = false;
            if (!ok) return;
        }
        show(current + 1);
        form.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
    prevBtn.addEventListener('click', () => show(current - 1));

    form.addEventListener('submit', e => {
        for (let s = 1; s <= steps.length; s++) {
            if (!validateStep(s)) { e.preventDefault(); show(s); validateStep(s); return; }
        }
        // Send phones in full international form (+2519...), whatever the user typed.
        phones.forEach((iti, input) => { input.value = iti.getNumber(); });
    });

    // Every other box is checked when the user leaves it (company name and email have their own
    // check above). Moving within a field, e.g. to a phone's country picker, doesn't count as leaving.
    form.addEventListener('focusout', e => {
        const input = e.target;
        const field = input.closest('.gs-field');
        if (!field || field.classList.contains('gs-group') || input.closest('.ts-wrapper')) return;
        if (input.name === 'companyName' || input.name === 'email') return;
        if (e.relatedTarget && field.contains(e.relatedTarget)) return;
        setError(field, checkInput(input));
    });
    [[countryPicker, countrySelect], [cityPicker, citySelect]].forEach(([picker, select]) => {
        picker.on('blur', () => setError(select.closest('.gs-field'), checkInput(select)));
    });

    // Clear a field's error as soon as the user fixes it.
    form.addEventListener('input', e => {
        const field = e.target.closest('.gs-field');
        if (field && field.classList.contains('is-invalid') && !field.classList.contains('gs-group') && !e.target.closest('.ts-wrapper')) {
            setError(field, checkInput(e.target));
        }
    });
    form.addEventListener('change', e => {
        syncOthers();
        const group = e.target.closest('.gs-group');
        if (group && group.classList.contains('is-invalid')) setError(group, '');
        if (e.target.tagName === 'SELECT') {
            const field = e.target.closest('.gs-field');
            if (field.classList.contains('is-invalid')) setError(field, checkInput(e.target));
        }
    });
    // Enter in a text box moves to the next step instead of submitting early
    // (inside a dropdown it picks the highlighted option instead).
    form.addEventListener('keydown', e => {
        if (e.key === 'Enter' && e.target.tagName === 'INPUT' && !e.target.closest('.ts-wrapper') && current < steps.length) {
            e.preventDefault();
            nextBtn.click();
        }
    });

    syncOthers();
    show(current);
})();
</script>
@endsection
