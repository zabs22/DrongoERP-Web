@extends('layout/mainlayout')

@section('page-content')
<style>

    .card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        width: 500px;
        gap: 20px;
        height: 550px;
        text-align: center;
        box-shadow: 0 10px 20px rgba(234, 234, 237, 0.2);
        transition: transform 0.3s ease;
    } 
    .card:hover {
        transform: translateY(-10px);
    }

    .line-after {
       position: relative;
    }
    .line-after::after {
        content: '';
        display: block; 
        width: 50%; 
        height: 1px; 
        background-color: black; 
        margin: 30px auto 0;
    }

</style>

<div class="container mt-5" style="margin-bottom: 200px;">
    <div class="steps">
        <div class="step completed">1</div>
        <div class="step completed">2</div>
        <div class="step completed">3</div>
        <div class="step completed">4</div>
        <div class="step active">5</div>
    </div>

    <div class="text-center mb-5">
        <h1 style="font-size: 70px; margin: 100px 0 0 0;">Choose Your Plan</h1>
        <p style="margin:0px; font-size: 25px;">Unlock Endless Possibilities</p>
    </div>

    <div class="row justify-content-center g-0" style="margin-top: 100px; ">
        <div class="col-md-4" style="margin-right: 180px;">
            <a href="/choosePackage" class="text-decoration-none">
                <div class="card">
                     <div class="icon mb-3">
                        <img src="{{ asset('/images/icon/Startup.png') }}" alt="GetStarted Image" style="width: 200px; height: 180px;">
                    </div>
                    <h2 style="font-size: 40px;">Choose Package</h2>
                    <p class="h5 text-dark line-after">Start Your Journey</p>
                    <p class="text-dark" style=" margin-top: 25px;">Select the package that best suits your needs and enjoy customized features designed just for you.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4" style="margin-right: 20px;">
            <a href="{{route('DrongoERP.submitChosenPackage', ['package' => 'Free Trial'])}}?totalAmount=0" class="text-decoration-none">
                <div class="card">
                     <div class="icon mb-3">
                        <img src="{{ asset('/images/icon/Free Trial.png') }}" alt="Free Trial Image" style="width: 200px; height: 180px;">
                    </div>
                    <h2 style="font-size: 40px;">Free Trial</h2>
                    <p class="h5 text-dark line-after">Explore for Free</p>
                    <p class="text-dark" style=" margin-top: 25px;">Experience our system with a complementary free trial and discover how it can transform your workflow.</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Submit Button -->

    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; margin: 100px 0 0 100px;">
        <div class="actionBox" style="display: flex; align-items: center; gap: 10px; padding: 10px; border-radius: 8px; cursor: pointer;">
            <i class="fas fa-caret-left "  style="font-size: 40px;"></i>
            <a href="{{ route('DrongoERP.getStarted') }}" class="actionButton" style="margin: 0; font-size: 20px; color: black;">Previous</a>
        </div>
    </div>
    
</div>

@endsection
