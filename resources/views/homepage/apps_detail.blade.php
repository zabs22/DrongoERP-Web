@extends('layout/mainlayout')

@section('page-content')

<style>

    .fade-slider {
        width: 100vw; 
        height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex; 
        justify-content: center; 
        align-items: center;
        padding: 20px;
    }

    .fade-slider img {
        object-fit: cover;
        position: absolute;
        transition: opacity 2s ease-in-out;
    }

    .image-wrapper {
        box-shadow: 0 4px 8px rgba(63, 8, 8, 0.2);
        border-radius: 15px;
        transition: transform 0.3s ease; 
        display: block; 
    }

    .tabs {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .tab-button {
        border: none;
        background-color: transparent;
        font-family: Raleway,sans-serif;
        font-weight: 700;
        cursor: pointer;
        padding: 10px 20px;
        border-bottom: 2px solid transparent;
        transition: border-color 0.3s;
        width: 400px;
        text-align: start;
        line-height: 40px;
    }
    .tab-button.active {    
        color: #F08109;
        border-color: #F08109;
        text-align: center;  
    }
    .tab-panel {
         display: none;
    }
    
    .benefits-section {
        padding: 200px 20px;
    }
    .benefits-title {
        text-align: center;
        font-weight: bold;
        color: #333333;
        margin-bottom: 100px;
    }
    .benefits-card {
        background-color: #ffffff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .benefits-icon {
        font-size: 3rem;
        color: #F08109;
        margin-bottom: 15px;
    }
    .benefits-card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333333;
        margin-bottom: 10px;
    }
    .benefits-card-text {
        color: #555555;
        font-size: 1rem;
    } 

    .whyChoose-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px; 
        margin-top: 20px;
    }

    .whyChoose-item {
        background: #f9f9f9; 
        border-radius: 10px;
        padding: 25px; 
        text-align: center; 
    }

    .whyChoose-icon {
        font-size: 40px;
        margin-bottom: 10px;
        color: #F08109; 
    }

    .whyChoose-title {
        margin-bottom: 100px;
        text-align: center;

    }

    .whyChoose-item-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .whyChoose-item-text {
        font-size: 14px;
        color: #555;
    }
        @media (max-width: 768px) {
            .whyChoose-grid {
                grid-template-columns: 1fr; 
            }
        }

    .zubuz-iconbox-number {
        color: white;
        background-color: #F08109;
    }

        
</style>

    <div class="container" style="margin-top:200px;">
        <img src="{{ !empty($app['allDeviceImg']) ? asset('storage/' . $app['allDeviceImg']) : asset('images/icon/DrongoERP Screenshots.png') }}" alt="Screenshot">

        <div class="row g-4"> 
            <div class="col-md-6 d-flex justify-content-center">
                <div class="text-center p-4" style="width: auto;">
                  <img src="{{ asset('storage/' . $app['icon']) }}" alt="Icon">
                </div>
            </div>
        
            <div class="col-md-6 d-flex justify-content-center">
                <div class="text-start p-4" style="width: auto; margin-top: 70px;">
                    <h2>{{ $app->title }}</h2>
                    <p style="text-align: justify; margin-top: 50px;"> 
                        {{ $app->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center p-4" style="width: auto; height: auto; margin-top:200px ">
            <h2 class="card-text">
                {{ $app->tagline }}
            </h2> 
        </div>
    </div>

    <div style="background-color: #f2f2f2; width: 100%; position: relative; margin-top: 300px;">
        <div class="fade-slider">
            @foreach (json_decode($app['screenshot']) as $screenshot)
                <img class="image-wrapper slider-img" src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot" >
            @endforeach
        </div>
    </div>
        
    <div class="container" style="margin-top:200px;">
        
        <h2 style="margin-top: 50px; margin-bottom: 100px; text-align:center;">Modules</h2>

        <div class="row g-4" style="margin-bottom: 200px;"> 
            <div class="col-md-5">
                <div class="tabs row" style="margin-top: 100px;">
                    @foreach (json_decode($app->module) as $key => $module)
                        <button class="tab-button {{ $key === 0 ? 'active' : '' }}" data-target="{{ $module->title }}">
                            {{ $module->title }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7">
                <div class="tab-content">
                    @foreach (json_decode($app->module) as $key => $module)
                        <div id="{{ $module->title }}" class="tab-panel {{ $key === 0 ? 'active' : '' }}">
                            <div class="row g-4 align-items-center"> 
                                <li class="list-group-item px-0" style="border: none;">
                                    <div class="d-flex align-items-center justify-content-center" style="margin-bottom: 50px;">
                                        <h4 style="color: #F08109;">{{ $module->title }}</h4>
                                    </div>
                                    
                                    @foreach ($module->image as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $module->title }} Image" class="image-wrapper" style="width: 90%; height:700px;">
                                    @endforeach

                                    <ul class="list-unstyled" style="margin-top: 30px;">
                                        @foreach ($module->text as $text)
                                        <li class="d-flex align-items-center mb-3">
                                            <img src="{{ asset('images/icon/bullet.png') }}" width="10px" height="10px" class="me-2 ms-5">
                                            {{ $text }}
                                        </li>
                                        @endforeach
                                    </ul>    
                                </li>
                               
                               
                
                            </div>
                        </div>
                    @endforeach 
                


                </div>
            </div>
        </div>
    
        <div class="whyChoose-container">
            <h2 class="whyChoose-title">Why Choose This App</h2>
            <div class="whyChoose-grid">
                @foreach (json_decode($app->procedure) as $key => $procedure)
                <div class="whyChoose-item">
                    <div class="whyChoose-icon">
                        <i class="{{$procedure->icon}}"></i>
                    </div>
                    
                    <div class="whyChoose-content">
                        <h5 class="whyChoose-item-title">{{$procedure->title}}</h5>
                        <p class="whyChoose-item-text">{{$procedure->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
       
        <div class="benefits-section">
            <h2 class="benefits-title">Potential Benefits!</h2>
            <div class="row g-4">
                @foreach (json_decode($app->benefit) as $key => $benefit)
                <div class="col-md-4">
                    <div class="card benefits-card text-center p-4">
                        <div class="benefits-icon">
                            <i class="{{$benefit->icon}}"></i>
                        </div>
                        <h5 class="benefits-card-title">{{$benefit->title}}</h5>
                        <p class="benefits-card-text">{{$benefit->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <section id="how-it-works" style="margin-bottom: 200px; padding: 50px 0;">
        <div class="text-center">
            <h2 style="margin-bottom: 150px; font-weight: bold;">How It Works</h2>
            <div class="row g-4 align-items-center justify-content-center" style="gap: 50px;">
            @foreach (json_decode($app->step) as $key => $step)
            <div class="col-lg-2 col-md-6" >
                <div class="card border-0 text-center" style="background-color: transparent;">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="zubuz-iconbox-number">{{$loop->iteration}}</div>
                    <h3 class="card-title" style="margin-top: 20px; font-weight: bold;">{{$step->title}}</h3>
                    <p class="card-text" style="color: #6c757d; font-size: 18px;">
                        {{$step->description}}
                    </p>
                </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </section>

    
@endsection