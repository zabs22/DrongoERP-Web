@extends('layout/mainlayout')

@php
    $total = $companyProfile->totalAmount;
@endphp

@section('page-content')

<style>
    .done-page { padding: 140px 16px 120px; }
    .done-card { max-width: 600px; margin: 0 auto; border-radius: 12px; overflow: hidden; background: #fff; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .12); }
    .done-card__top { padding: 48px 32px 40px; text-align: center; }
    .done-card__check { width: 96px; height: 96px; margin: 0 auto 20px; border-radius: 50%; display: grid; place-items: center; background: green; color: #fff; font-size: 36px; }
    .done-card__top h4 { margin: 0 0 16px; }
    .done-card__lead { margin: 0 0 12px; color: #000; font-weight: 700; }
    .done-card__note { margin: 0 0 28px; color: #6c757d; }
    .done-card__sent { margin: 16px 0 0; color: green; font-weight: 600; }
    .done-card__details { margin: 0; padding: 28px 32px; background: #ebedef; display: grid; gap: 16px; }
    .done-card__row { display: grid; grid-template-columns: 24px auto 1fr; align-items: center; column-gap: 10px; }
    .done-card__row img { max-width: 22px; }
    .done-card__row dt { margin: 0; font-weight: 700; color: #000; white-space: nowrap; }
    .done-card__row dd { margin: 0; color: #212529; overflow-wrap: anywhere; }
    .done-card__row dd a { color: inherit; }
    @media (max-width: 480px) {
        .done-card__top, .done-card__details { padding-left: 20px; padding-right: 20px; }
        .done-card__row { grid-template-columns: 24px 1fr; }
        .done-card__row dd { grid-column: 2; }
    }
</style>

<div class="done-page">
    <div class="done-card">
        <div class="done-card__top">
            <div class="done-card__check" aria-hidden="true">✓</div>
            <h4>Success!</h4>
            <p class="done-card__lead">Welcome to DrongoERP! You’re about to embark on an amazing journey.</p>
            <p class="done-card__note">Your account is ready and you're signed in. Log in any time with your email and the password you chose.</p>
            <a class="zubuz-default-btn pill" href="{{ route('dashboard') }}"><span>Go to your dashboard</span></a>
            {{-- Email verification disabled for now. When re-enabled, wrap the two lines above in
                 @if (auth()->user()->hasVerifiedEmail()) ... @else and show this instead:
                <p class="done-card__note">We've sent a verification link to <strong>{{ auth()->user()->email }}</strong>. Click it to activate your dashboard, then log in any time with your email and the password you chose.</p>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="zubuz-default-btn pill"><span>Resend verification email</span></button>
                </form>
                @if (session('status') === 'verification-link-sent')
                    <p class="done-card__sent">A new verification link is on its way.</p>
                @endif
            --}}
        </div>

        @if (!empty($accountDetails))
            <dl class="done-card__details">
                <div class="done-card__row">
                    <img src="{{ asset('/images/icon/web_icon.png') }}" alt="">
                    <dt>Website:</dt>
                    <dd><a href="https://drongoerp.com/" target="_blank" rel="noopener">https://drongoerp.com/</a></dd>
                </div>
                <div class="done-card__row">
                    <img src="{{ asset('/images/icon/email_icon.png') }}" alt="">
                    <dt>Email:</dt>
                    <dd>{{ $accountDetails['email'] }}</dd>
                </div>
                <div class="done-card__row">
                    <img src="{{ asset('/images/icon/password_icon.png') }}" alt="">
                    <dt>Package:</dt>
                    <dd>{{ $selectedPackage }}</dd>
                </div>
                <div class="done-card__row">
                    <img src="{{ asset('/images/icon/password_icon.png') }}" alt="">
                    <dt>Total Amount:</dt>
                    <dd>
                        @if (is_array($total) && isset($total['monthly']))
                            {{ $total['currency'] ?? 'ETB' }} {{ number_format($total['monthly'], 2) }} / month
                            @if (!empty($total['modules'])) ({{ count($total['modules']) }} features) @endif
                        @else
                            Custom pricing — our team will contact you
                        @endif
                    </dd>
                </div>
            </dl>
        @endif
    </div>
</div>

@endsection
