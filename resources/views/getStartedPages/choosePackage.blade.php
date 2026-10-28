@extends('layout/mainlayout')

@section('page-content')
<div class="container choose-package">
    <div class="steps">
        <div class="step completed">1</div>
        <div class="step completed">2</div>
        <div class="step completed">3</div>
        <div class="step completed">4</div>
        <div class="step active">5</div>
    </div>

    <div class="zubuz-section-title center">
        <h2>Choose your package</h2>
        <p>Compare plans in your currency, or explore a package to fine-tune its modules.</p>
    </div>

    @include('partials.pricing-plans', ['mode' => 'signup'])

    <div class="choose-package__back">
        <a href="{{ route('DrongoERP.choosePlan') }}" class="gs-btn--ghost"><i class="fas fa-arrow-left" aria-hidden="true"></i> Previous</a>
    </div>
</div>
@endsection
