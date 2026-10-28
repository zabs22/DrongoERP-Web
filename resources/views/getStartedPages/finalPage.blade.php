@extends('layout/mainlayout')

@section('page-content')

<style>
    body{
        padding: 90px 10px;
    } 
    .bg-light {
        background-color: #ebedef !important;               
    } 
</style>

<div class="steps">
    <div class="step completed"></div>
    <div class="step completed"></div>
    <div class="step completed"></div>
    <div class="step completed"></div>
    <div class="step completed"></div>
</div>

<div class="d-flex justify-content-center align-items-center" style="margin-top: 70px; margin-bottom: 150px;">
    <div class="big-box text-center p-2 rounded shadow-lg w-100" style="max-width: 600px; height: 80vh;">
        <div class="bg-light-green text-success p-5" style="height: 70%; "> 
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="circle text-white d-flex justify-content-center align-items-center mb-3" style="font-size: 30px; background-color: green; color: white;">
                    ✓
                </div>
                <h4>Success! </h4>
                <p style="margin-top: 15px; margin-bottom:20px; color: black; font-weight:bold;">
                    Welcome to DrongoERP! You’re about to embark on an amazing journey.
                </p>
                <p class="text-muted mb-3" style="color: black;">
                    Here are your login details for your convenience:  
                </p>
                <p class="text-muted" style="margin: 0 0; color: black;">
                    Make sure to keep them safe so you can access all the amazing features that await you!
                </p>
            </div>
        </div>
        @if(!empty($accountDetails))
        <div class="bg-light text-dark p-4" style="height: 30%; "> 
            <div class="d-flex align-items-center mb-3" style="margin-left: 40px;">
                <img src="{{ asset('/images/icon/web_icon.png') }}" alt="Website Icon" style="max-width: 20px;" class="me-2">
                <h5 class="me-2">Website:</h5>
                <a href="https://www.{{ \Illuminate\Support\Str::of($accountDetails['company_name'])->lower()->replace(' ', '') }}.drongoERP.com" class="text-dark email-link">
                    www.{{ \Illuminate\Support\Str::of($accountDetails['company_name'])->lower()->replace(' ', '') }}.drongoERP.com
                </a>

            </div>
            <div class="d-flex align-items-center mb-3" style="margin-left: 40px;">
                <img src="{{ asset('/images/icon/email_icon.png') }}" alt="Email Icon" style="max-width: 25px;" class="me-2">
                <h5 class="me-2">Email:</h5>
                <a href="{{ $accountDetails['email'] }}" class="text-dark email-link">
                    {{ $accountDetails['email'] }}
                </a>
                
            </div>
            <div class="d-flex align-items-center mb-3" style="margin-left: 40px;">
                <img src="{{ asset('/images/icon/password_icon.png') }}" alt="Password Icon" style="max-width: 25px;" class="me-2">
                <h5 class="me-2">Package:</h5> 
                <span class="text-dark email-link">{{ $selectedPackage }}</span>
            </div>
            <div class="d-flex align-items-center mb-3" style="margin-left: 40px;">
                <img src="{{ asset('/images/icon/password_icon.png') }}" alt="Password Icon" style="max-width: 25px;" class="me-2">
                <h5 class="me-2">Total Amount:</h5> 
                @php($total = session('total_amount'))
                <span class="text-dark email-link">
                    @if (is_array($total) && isset($total['monthly']))
                        {{ $total['currency'] ?? 'ETB' }} {{ number_format($total['monthly'], 2) }} / month
                        @if (!empty($total['modules'])) ({{ count($total['modules']) }} features) @endif
                    @else
                        Custom pricing — our team will contact you
                    @endif
                </span>

            </div>
        </div>
        @endif 
    </div>
</div>

@endsection

