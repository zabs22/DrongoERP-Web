@extends('layout/mainlayout')

@section('page-content')
    @php($previous = config('apps.' . ($app['id'] - 1)) ? $app['id'] - 1 : null)
    @php($next = config('apps.' . ($app['id'] + 1)) ? $app['id'] + 1 : null)

    <header class="dg-hero dg-apphero">
        <div class="dg-hero__grid" aria-hidden="true"></div>
        <div class="dg-hero__glow" aria-hidden="true"></div>
        <div class="container dg-hero__content">
            <a class="dg-apphero__back" href="{{ route('DrongoERP.home') }}#apps"><i class="fas fa-arrow-left" aria-hidden="true"></i> All apps</a>
            <span class="dg-icon dg-apphero__icon"><img src="{{ asset('images/apps_logo/' . $app['icon']) }}" alt=""></span>
            <h1 class="dg-title dg-title--md">{{ $app['title'] }}</h1>
            <p class="dg-lead">{{ $app['tagline'] }} {{ $app['summary'] }}</p>
            <div class="dg-hero__actions">
                <a class="dg-btn dg-btn--primary" href="{{ route('DrongoERP.getStarted') }}">Get Started</a>
                <a class="dg-btn dg-btn--glow" href="{{ route('DrongoERP.contact') }}">Contact Us</a>
            </div>
        </div>
    </header>

    <section class="dg-section">
        <div class="container">
            <div class="dg-heading">
                <h2 class="dg-title dg-title--md">What's included</h2>
            </div>
            <div class="dg-appfeatures">
                @foreach ($app['features'] as $feature)
                    <article class="dg-card">
                        <h3>{{ $feature['name'] }}</h3>
                        <p>{{ $feature['description'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="dg-appplans">
                @if ($app['plans'])
                    <h3 class="dg-title dg-title--sm">Available in</h3>
                    <div class="dg-hero__actions">
                        @foreach ($app['plans'] as $slug => $plan)
                            <a class="dg-btn dg-btn--glow" href="{{ route('DrongoERP.package', $slug) }}">{{ $plan['name'] }}</a>
                        @endforeach
                    </div>
                @else
                    <h3 class="dg-title dg-title--sm">Interested in this app?</h3>
                    <p>Talk to our team and we'll set it up for your business.</p>
                @endif
            </div>

            <nav class="dg-appnav" aria-label="Other apps">
                @if ($previous)
                    <a href="{{ route('DrongoERP.appsDetail', $previous) }}"><i class="fas fa-arrow-left" aria-hidden="true"></i> {{ config("apps.$previous.title") }}</a>
                @endif
                @if ($next)
                    <a class="dg-appnav__next" href="{{ route('DrongoERP.appsDetail', $next) }}">{{ config("apps.$next.title") }} <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                @endif
            </nav>
        </div>
    </section>
@endsection
