{{--
    Scrollable plan cards with live currency conversion.
    $mode: 'home'   → buttons start the sign-up form with the plan preselected
           'signup' → buttons pick the plan for the sign-up already in progress
--}}
@php($plans = \App\Support\PackageCatalog::plans())
@php($accountPlan = auth()->user()?->companyProfile?->selectedPackage)

<div class="drongo-plans" data-plans>
    <div class="drongo-plans__bar">
        @include('partials.currency-select')
        <div class="drongo-plans__arrows">
            <button type="button" class="drongo-plans__arrow" data-plans-prev aria-label="Previous plans"><i class="fas fa-chevron-left"></i></button>
            <button type="button" class="drongo-plans__arrow" data-plans-next aria-label="More plans"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="drongo-plans__track" data-plans-track>
        @foreach ($plans as $plan)
            <article class="drongo-plan {{ $plan['dark'] ? 'drongo-plan--dark' : '' }} {{ $plan['badge'] === 'Bestseller' ? 'drongo-plan--featured' : '' }}"
                     @if ($plan['badge'] === 'Bestseller') data-featured @endif aria-label="{{ $plan['name'] }} plan">
                @if ($plan['badge'])
                    <span class="drongo-plan__badge">{{ $plan['badge'] }}</span>
                @endif
                <h3 class="drongo-plan__name">{{ $plan['name'] }}</h3>

                <div class="drongo-plan__price">
                    @if ($plan['price'] !== null)
                        <span class="drongo-plan__amount" data-price-etb="{{ $plan['price'] }}">ETB {{ number_format($plan['price']) }}</span>
                        <span class="drongo-plan__per">/ month</span>
                    @else
                        <span class="drongo-plan__amount drongo-plan__amount--custom">Custom pricing</span>
                    @endif
                </div>

                <p class="drongo-plan__tagline">{{ $plan['tagline'] }}</p>
                <img class="drongo-plan__image" src="{{ asset($plan['image']) }}" alt="" loading="lazy">

                <a class="drongo-plan__details" href="{{ route('DrongoERP.package', $plan['slug']) }}">
                    {{ $plan['slug'] === 'special' ? 'Build your own package' : 'Explore what’s included' }}
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>

                @if ($mode === 'home' && auth()->user()?->companyProfile)
                    <a class="drongo-plan__cta" href="{{ route('DrongoERP.package', $plan['slug']) }}">
                        {{ $accountPlan === $plan['name'] ? 'Your current plan' : 'View plan' }}
                    </a>
                @elseif ($plan['slug'] === 'special')
                    <a class="drongo-plan__cta" href="{{ route('DrongoERP.package', $plan['slug']) }}">Choose modules</a>
                @elseif ($mode === 'signup')
                    <a class="drongo-plan__cta" href="{{ route('DrongoERP.submitChosenPackage', ['package' => $plan['name']]) }}">
                        {{ $plan['price'] === null ? 'Request access' : 'Choose ' . $plan['name'] }}
                    </a>
                @else
                    <a class="drongo-plan__cta" href="{{ route('DrongoERP.getStarted', ['package' => $plan['name']]) }}">
                        {{ $plan['price'] === null ? 'Request access' : 'Get started' }}
                    </a>
                @endif
            </article>
        @endforeach
    </div>

    <div class="drongo-plans__dots" role="group" aria-label="Plans">
        @foreach ($plans as $plan)
            <button type="button" class="drongo-plans__dot" data-plans-dot aria-label="Show {{ $plan['name'] }} plan"></button>
        @endforeach
    </div>
</div>
