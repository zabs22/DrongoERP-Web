@extends('layout/mainlayout')

@section('page-content')
    <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">Contact Us</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('DrongoERP.home') }}">Home</a></li>
                    <li aria-current="page"> Contact Us</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section zubuz-section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="zubuz-default-content m-right">
                        <h2>Contact our support team</h2>
                        <p>Book an appointment with our team right away! If you have any questions about managing and growing your business, contact our team and schedule a meeting with our professionals.</p>
                        <div class="zubuz-extara-mt">
                            <div class="zubuz-iconbox-wrap-left d-block">
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Office Location:</span>
                                    <p>Gulf Aziz Bldg., Namibia Street, Bole, Addis Ababa, Ethiopia.</p>
                                </div>
                            </div>
                            <div class="zubuz-iconbox-wrap-left d-block">
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Social Media:</span>
                                    <div class="zubuz-social-icon social-box">
                                        <ul>
                                            <li>
                                                <a href="https://www.linkedin.com/company/drongoerp" target="_blank">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/drongoerp/" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://facebook.com/drongoerp" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://t.me/drongoerp" target="_blank">
                                                    <i class="fab fa-telegram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://whatsapp.com/drongoerp" target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="zubuz-form-wrap">
                        <h3>Fill the from below</h3>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="zubuz-main-form">
                                        <input type="text" placeholder="Your Name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="zubuz-main-form">
                                        <input type="email" placeholder="Email Address*">
                                    </div>
                                </div>
                            </div>
                            <div class="zubuz-main-form">
                                <input type="text" placeholder="Subject">
                            </div>
                            <div class="zubuz-main-form">
                                <textarea name="textarea" placeholder="Write us your comment"></textarea>
                            </div>
                            <button id="zubuz-submit-btn" type="button"><span>Send Message</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <div class="section dark-bg zubuz-section-padding6">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <a href="tel:123">
                        <div class="zubuz-iconbox-wrap-left text-center-lg rt-mb-24">
                            <div class="zubuz-iconbox-icon">
                                <img src="{{ asset('/images/icon/call2.svg') }}" alt="">
                            </div>
                            <div class="zubuz-iconbox-data light">
                                <h3>Call us directly</h3>
                                <a href="tel:+251907778899" class="text-white">+251-90-777-8899</a><br>
                                <a href="tel:+251908778899" class="text-white">+251-90-877-8899</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="mailto:name@email.com">
                        <div class="zubuz-iconbox-wrap-left text-center-lg rt-mb-24">
                            <div class="zubuz-iconbox-icon">
                                <img src="{{ asset('/images/icon/email3.svg') }}" alt="">
                            </div>
                            <div class="zubuz-iconbox-data light">
                                <h3>Email us</h3>
                                <a href="mailto:contact@drongoerp.com" class="text-white">contact@drongoerp.com</a><br>
                                <a href="mailto:info@drongoerp.com" class="text-white">info@drongoerp.com</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="zubuz-iconbox-wrap-left text-center-lg rt-mb-24">
                        <div class="zubuz-iconbox-icon">
                            <img src="{{ asset('/images/icon/map2.svg') }}" alt="">
                        </div>
                        <div class="zubuz-iconbox-data light">
                            <h3>Our office address</h3>
                            <p>Namibia St., Gulf Aziz Bldg., Bole, Addis Ababa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section zubuz-section-padding3">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>Find all the answers to your management problems</h2>
            </div>
            <div class="zubuz-accordion-wrap zubuz-accordion-wrap2" id="zubuz-accordion">
                <div class="zubuz-accordion-item open">
                    <div class="zubuz-accordion-header">
                        <p>Q: What makes DrongoERP stand out from competitors?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p> Our cloud-based ERP platform distinguishes itself through a combination of  <span class="text-orange">affordable</span> pricing, <span class="text-orange">user-friendly</span> design, <span class="text-orange">robust</span> feature set, and a commitment to <span class="text-orange">constant innovation</span> with upto two updates per week. We prioritize customer feedback to ensure we stay ahead of the curve and meet evolving business needs.</p>
                    </div>
                </div>
                <div class="zubuz-accordion-item">
                    <div class="zubuz-accordion-header">
                        <p>Q: How secure is the data stored on your platform?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p>Security is our  <span class="text-orange">top priority</span>. We employ state-of-the-art encryption, regular security audits, and compliance with industry standards to safeguard your data. Our commitment is to provide a secure environment for your  <span class="text-orange">valuable information.</span></p>
                    </div>
                </div>

                <div class="zubuz-accordion-item">
                    <div class="zubuz-accordion-header">
                        <p>Q: Do you provide free trial for new clients?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p>We offer a  <span class="text-orange">free trial</span> for new clients. We understand the importance of making informed decisions, and our goal is to provide a hassle-free experience for all clients. Our ERP solution is designed to seamlessly integrate with popular tools and platforms, ensuring a smooth workflow and  <span class="text-orange">minimizing disruptions</span> to your current processes.</p>
                    </div>
                </div>

                <div class="zubuz-accordion-item">
                    <div class="zubuz-accordion-header">
                        <p>Q: What kind of customer support can we expect?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p>Our customer support team is dedicated to your  <span class="text-orange">success</span>. You can expect prompt responses, helpful resources, and  <span class="text-orange">personalized assistance</span> with upto two meetings every week with our team of professionals. We believe in building  <span class="text-orange">long-lasting relationships</span> with our users, and exceptional support.</p>
                    </div>
                </div>

                <div class="zubuz-accordion-item">
                    <div class="zubuz-accordion-header">
                        <p>Q: How does your pricing model work, and is there flexibility as our business grows?</p>
                        <div class="zubuz-active-icon plus">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p>We offer a range of <span class="text-orange">flexible pricing</span> plans to accommodate businesses of all sizes. Whether you're a startup or an enterprise, our pricing <span class="text-orange">scales</span> with your needs. You can choose from monthly or annual billing.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Section -->
@endsection