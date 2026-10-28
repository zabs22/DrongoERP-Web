@extends('layout/mainlayout')

<style>
    .slider-wrapper {
      overflow: hidden; 
      width: 100%;
      position: relative;
      margin: 100px 0;
    }
    .slider-track {
      display: flex;
      gap: 20px; 
      animation: slide-infinite 30s linear infinite; 
      will-change: transform;
    }
    .slide {
        flex: 0 0 16.66%;
        box-sizing: border-box;
        padding: 10px;
        width: 200px;
        height: 200px;
    }
    .slide img {
        width: 100%;
        height: auto;
        display: block;
    }
        .none-bg img {
        width: 100%;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; 
    }
    .zubuz-iconbox-wrap-left.iconbox-left-border {
        border: 1px solid #fff !important;
        
    }
    .zubuz-iconbox-wrap-left.iconbox-left-border:hover {
        border: 1px solid #fff !important;
        box-shadow: none !important;
    }
    @keyframes slide-infinite {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-210px * 20));/* num of card * 2 */
        }
    }
    @media (max-width: 768px) {
        .slide {
            flex: 0 0 33.33%;
            width: 150px; 
            height: 150px;
        }
    }

    @media (max-width: 480px) {
        .slide {
            flex: 0 0 50%; 
            width: 120px;
            height: 120px;
        }
    }


    /* Style for Testimonial  */

    .video-wrapper {
    position: relative;
    overflow: hidden;
    }

    .video-track {
    display: flex;
    transition: transform 1s ease;
    }

    .zubuz-video-column {
    flex: 0 0 100%; 
    display: flex;
    justify-content: center;
    }

    .waves {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.1);
    animation: wave-animation 2s infinite ease-in-out;
    }

    @keyframes wave-animation {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    }


    .video-dots {
        display: flex;
        justify-content: center;
        margin-top: 20px; 
    }

    .dot {
        width: 12px;
        height: 12px;
        margin: 0 5px;
        background-color: #ccc; 
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dot.active {
        background-color: #000; 
    }
</style>

@section('page-content')
    <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">Testimonial</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('DrongoERP.home') }}">Home</a></li>
                    <li aria-current="page">Testimonial</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section zubuz-section" style="margin: 50 0 0 0;">
        <div class="container">
            <div class="zubuz-section-title text-center"">
                <h2>Partners</h2>
            </div>
        </div>
    </div> 
    
    <div class="slider-wrapper">
        <div class="slider-track">
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border" style="width: 200px; height: 200px;">
                <div class="none-bg" >
                    <img src="{{asset('/images/logos/oro fresh Logo.png') }}" alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/EB YES Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/andegna Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/Dalga Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/HABAR Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/ANI Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/KKGT Logo.png') }}"  alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border" style="width: 100px; height: 200px; overflow: hidden;">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/yanu light Logo.png') }}" alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border" style="width: 100px; height: 200px; overflow: hidden;">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/Walta Tech Logo.png') }}" alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border" style="width: 100px; height: 200px; overflow: hidden;">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/Allstar Logo.png') }}" alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div> 
            <div class="slide zubuz-iconbox-wrap-left iconbox-left-border" style="width: 100px; height: 200px; overflow: hidden;">
                <div class="none-bg">
                    <img src="{{asset('/images/logos/AquaUno Logo.png') }}" alt="" class="img-fluid" style="max-width: 100%; max-height: 100%;">
                </div>  
            </div>         

        </div>
    </div> 
   


<div class="container">
    <div class="zubuz-section-title zubuz-two-column-title">
        <div class="row">
            <div class="col-lg-8">
                <h2>Loved by all customers</h2>
            </div>
        </div>
    </div>
    <div class="video-wrapper">
        <div class="video-track">
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"DrongoERP has revolutionized our manufacturing processes, providing real-time visibility into production, supply chain, and quality control. This has significantly enhanced our efficiency and reduces our expenses.”</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Ephrem Birhanu</p>
                                    <span>Owner @EBYes Furniture</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="http://127.0.0.1:8003/images/v2/b_v2_5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"The implementation of DrongoERP has led to significant improvements in our operational efficiency and streamlined processes across our entire system. It has empowered us to manage inventory, sales, and procurement with greater accuracy and real-time insights, allowing us to make more informed decisions. Additionally we've observed is the automation of our workflows."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Mr. Ture Kassim</p>
                                    <span>D/Manager @Oro-fresh</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/oro fresh Logo.png') }}" alt="" width="50px" height="50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"It is with great pleasure that we extend this recommendation to Drongo Technology and their outstanding ERP solution, DrongoERP. Our collaboration with Drongo Technology has been transformative, and we highly recommend Drongo Technology and DrongoERP for any organization looking to improve operational efficiency and achieve sustainable growth through advanced technology solutions. Their expertise, dedication, and innovative mindset make them a trusted partner for any venture."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Mr. Abiy Asrat</p>
                                    <span>President @ANI</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/ANI Logo.png') }}" alt="" width="100px" height="50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"It is with great pleasure that we extend this recommendation to Drongo Technology and their outstanding ERP solution, DrongoERP. Our collaboration with Drongo Technology has been transformative, and we highly recommend Drongo Technology and DrongoERP for any organization looking to improve operational efficiency and achieve sustainable growth through advanced technology solutions. Their expertise, dedication, and innovative mindset make them a trusted partner for any venture."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Beyene Negusse</p>
                                    <span>G/Manager @Yonatan BT</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/YBT Logo.png') }}" alt="" width="100px" height="50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"DrongoERP successfully implemented an ERP and Project Management system for HABAR GROUP, enhancing operational efficiency, streamlining processes, and improving project management capabilities with comprehensive customization and ongoing support."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Eliyas Walelign</p>
                                    <span>Habar Architect</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/HABAR Logo.png') }}" alt="" width="100px" height="50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"DrongoERP successfully implemented a Project Management system for KiT STUDIO, enhancing operational efficiency, customer relations, and project management. The partnership focused on system tailoring, seamless integration, training, and ongoing support."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Kidus Teklu</p>
                                    <span>KiT Studio</span>
                                </div>
                                {{-- <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/Kit Logo.png') }}" alt="" width="100px" height="50px">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"We are a furniture manufacturing and retailing company. We were looking for an ERP system that would help us grow our business. We found DrongoERP, and it has been a great asset to our company. We would definitely recommend DrongoERP to other manufacturers as well."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Mr Leul Gossaye</p>
                                    <span>Co-founder @Andegna Furniture & Interior</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/andegna Logo.png') }}" alt="" width="70px" height="70px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"With heartfelt gratitude for your remarkable contributions to AllStar Psychological Services over the past five years. Your technical support has been instrumental in our shared journey and success, profoundly impacting the quality of our services and the growth of our organization."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Daniel M.</p>
                                    <span>G/manager @AllStar Psychological Services</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/Allstar Logo.png') }}" alt="" width="50px" height="70px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"I am happy with the DrongoERP system, which has completely changed how we run our leather production business. Since incorporating DrongoERP into our workflow, we've seen a significant improvement. I heartily urge any firm looking to maximize productivity and realize its full potential to give DrongoERP a try. I am confident that it will do the same for your company."</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Eyuel Girma</p>
                                    <span>G/manager @Dalaga Leather</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/Dalga Logo.png') }}" alt="" width="50px" height="50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="http://127.0.0.1:8003/images/v3/video-bg.png" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="http://127.0.0.1:8003/images/v3/play-btn.svg" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                                <li><img src="http://127.0.0.1:8003/images/v3/star.png" alt=""></li>
                            </ul>
                            <p>"I highly recommend DrongoERP, an excellent cloud-based ERP solution provided for my furniture retail shop. Since implementing DrongoERP, our operations have transformed significantly"</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Zersenay T.</p>
                                    <span>Manager @Fabulous Trading</span>
                                </div>
                                {{-- <div class="zubuz-testimonial-author-logo">
                                    <img src="{{asset('/images/logos/Dalga Logo.png') }}" alt="" width="50px" height="50px">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>  
</div>
<div style="margin-bottom: 200px;" class="video-dots"></div>

    <!-- end section -->


@endsection