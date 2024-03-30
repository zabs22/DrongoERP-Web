@extends('layout/mainlayout')

@section('page-content')
    <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">About Us</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('DrongoERP.home') }}">Home</a></li>
                    <li aria-current="page"> About Us</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section zubuz-section-padding3">
        <div class="container">
            <div class="zubuz-section-title zubuz-two-column-title">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Our company's journey story</h2>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center">
                        <p>Born in 2010 out of a passion for innovation and a commitment to redefining industry standards. Our story is one of resilience and creativity.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="zubuz-about-thumb">
                        <img src="assets/images/about/about1.png" alt="">
                    </div>
                    <div class="zubuz-about-thumb">
                        <img src="assets/images/about/about1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="zubuz-about-thumb">
                        <img src="assets/images/about/about3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="zubuz-about-thumb">
                        <img src="assets/images/about/about4.png" alt="">
                    </div>
                    <div class="zubuz-about-thumb">
                        <img src="assets/images/about/about5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->

    <div class="section zubuz-section-padding5">
        <div id="zubuz-counter"></div>
        <div class="container">
            <div class="zubuz-counter-wrap2">
                <div class="zubuz-counter-data orange-color">
                    <h2 class="zubuz-counter-number"><span data-percentage="15" class="zubuz-counter"></span><em>+</em></h2>
                    <p>Years of experience</p>
                </div>
                <div class="zubuz-counter-data orange-color">
                    <h2 class="zubuz-counter-number"><span data-percentage="2" class="zubuz-counter"></span><em>K</em></h2>
                    <p>Monthly active user</p>
                </div>
                <div class="zubuz-counter-data orange-color">
                    <h2 class="zubuz-counter-number"><span data-percentage="100" class="zubuz-counter"></span><em>%</em></h2>
                    <p>Client satisfaction score</p>
                </div>
                <div class="zubuz-counter-data orange-color">
                    <h2 class="zubuz-counter-number"><span data-percentage="30" class="zubuz-counter"></span><em>K</em></h2>
                    <p>Successful project</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="zubuz-divider"></div>
    <!-- end divider -->

    <div class="section zubuz-section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="zubuz-v3-thumb">
                        <img src="assets/images/v3/thumb-v3-2.png" alt="">
                        <div class="zubuz-v3-card">
                            <img src="assets/images/v3/card-v3-4.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="zubuz-default-content m-left">
                        <h2>Our core values drive our work</h2>
                        <p>We're dedicated to simplifying complex processes, fostering collaboration, and propelling your success.</p>
                        <div class="zubuz-extara-mt">
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-icon none-bg">
                                    <img src="assets/images/about/icon1.png" alt="">
                                </div>
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Innovation & Collaboration:</span>
                                    <p>We embrace creativity and continuous improvement, fostering a culture of innovation. We believe in the power of teamwork.</p>
                                </div>
                            </div>
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-icon none-bg">
                                    <img src="assets/images/about/icon2.png" alt="">
                                </div>
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Integrity & Customer-Centricity:</span>
                                    <p>We are committed to delivering exceptional value. We uphold the highest standards of honesty and ethics in everything we do.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section zubuz-section-padding3 dark-bg">
        <div class="container">
            <div class="zubuz-section-title light zubuz-two-column-title">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>We’ve a team of creatives</h2>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-title-btn">
                            <a class="zubuz-default-btn pill" href="{{ route('DrongoERP.careers') }}">
                                <span>Join Our Team</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="zubuz-team-wrap">
                        <div class="zubuz-team-thumb">
                            <img src="assets/images/team/team1.png" alt="">
                            <div class="zubuz-team-data">
                                <a href="">
                                    <h4>Mr. Abraham Maslow</h4>
                                </a>
                                <p>CEO & Founder</p>
                                <div class="zubuz-social-icon social-box small-box position">
                                    <ul>
                                        <li>
                                            <a href="https://twitter.com/" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://facebook.com/" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="zubuz-team-wrap">
                        <div class="zubuz-team-thumb">
                            <img src="assets/images/team/team6.png" alt="">
                            <div class="zubuz-team-data">
                                <a href="">
                                    <h4>William Robert</h4>
                                </a>
                                <p>VP of Marketing</p>
                                <div class="zubuz-social-icon social-box small-box position">
                                    <ul>
                                        <li>
                                            <a href="https://twitter.com/" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://facebook.com/" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="zubuz-team-wrap">
                        <div class="zubuz-team-thumb">
                            <img src="assets/images/team/team5.png" alt="">
                            <div class="zubuz-team-data">
                                <a href="">
                                    <h4>Henry Fayol</h4>
                                </a>
                                <p>WP Developer</p>
                                <div class="zubuz-social-icon social-box small-box position">
                                    <ul>
                                        <li>
                                            <a href="https://twitter.com/" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://facebook.com/" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->

    <div class="section zubuz-section-padding2">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>Find all the answers to your confusion</h2>
            </div>
            <div class="zubuz-accordion-wrap zubuz-accordion-wrap2" id="zubuz-accordion">
                <div class="zubuz-accordion-item open">
                    <div class="zubuz-accordion-header">
                        <p>Q: What makes your SaaS solution stand out from competitors?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p> Our SaaS platform distinguishes itself through a combination of user-friendly design, robust feature set, and a commitment to constant innovation. We prioritize customer feedback to ensure we stay ahead of the curve and meet evolving business needs.</p>
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
                        <p>Security is our top priority. We employ state-of-the-art encryption, regular security audits, and compliance with industry standards to safeguard your data. Our commitment is to provide a secure environment for your valuable information.</p>
                    </div>
                </div>
                <div class="zubuz-accordion-item">
                    <div class="zubuz-accordion-header">
                        <p>Q: Can your SaaS solution integrate with other tools we use?</p>
                        <div class="zubuz-active-icon">
                            <img src="assets/images/v3/plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="assets/images/v3/minus.png" alt="">
                        </div>
                    </div>
                    <div class="zubuz-accordion-body">
                        <p>Absolutely. We understand the importance of seamless integration. Our SaaS solution is designed to work harmoniously with a variety of popular tools and platforms, ensuring a smooth workflow and reducing any disruptions to your current processes.</p>
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
                        <p>Our customer support team is dedicated to your success. You can expect prompt responses, helpful resources, and, if needed, personalized assistance. We believe in building long-lasting relationships with our users, and exceptional support.</p>
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
                        <p>We offer a range of flexible pricing plans to accommodate businesses of all sizes. Whether you're a startup or an enterprise, our pricing scales with your needs. You can choose from monthly or annual billing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->
@endsection