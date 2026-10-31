@extends('layout/mainlayout')

@section('page-content')
    @include('homepage.partials.hero-services')

    <div class="section zubuz-section-padding3 bg-light" id="about">
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
                        <img src="{{ asset('/images/about/about-team.jpg') }}" alt="A team collaborating at their workstations" loading="lazy">
                    </div>
                    <div class="zubuz-about-thumb">
                        <img src="{{ asset('/images/about/about-product.jpg') }}" alt="Droongo dashboard on desktop, laptop, tablet and phone" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="zubuz-about-thumb">
                        <img src="{{ asset('/images/about/about-presentation.jpg') }}" alt="A team presentation in a modern office" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="zubuz-about-thumb">
                        <img src="{{ asset('/images/about/about-planning.jpg') }}" alt="A business planning session" loading="lazy">
                    </div>
                    <div class="zubuz-about-thumb">
                        <img src="{{ asset('/images/about/about-clients.jpg') }}" alt="Celebrating a business success" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="row zubuz-extara-mt">
                <div class="col-lg-6">
                    <div class="zubuz-iconbox-wrap-left mw-100">
                        <div class="zubuz-iconbox-icon none-bg">
                            <img src="{{ asset('/images/about/icon1.png') }}" alt="">
                        </div>
                        <div class="zubuz-iconbox-data data-small">
                            <span>Innovation & Collaboration:</span>
                            <p>We embrace creativity and continuous improvement, fostering a culture of innovation. We believe in the power of teamwork.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="zubuz-iconbox-wrap-left mw-100">
                        <div class="zubuz-iconbox-icon none-bg">
                            <img src="{{ asset('/images/about/icon2.png') }}" alt="">
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
    <!-- End About Section -->

    @php
        $apps = [
            1 => ['Products', 'Library-1.svg'],          2 => ['Sales', 'Shop-Bag.svg'],
            3 => ['Medical Center', 'Medical.svg'],      4 => ['LMS', 'Grad.svg'],
            5 => ['Relationships', 'Relationships.svg'], 6 => ['Manufacturing', 'Manufacturing.svg'],
            7 => ['Projects', 'Book.svg'],               8 => ['Tickets', 'Tickets.svg'],
            9 => ['Purchases', 'Full-Cart.svg'],         10 => ['Marketing', 'Megaphone.svg'],
            11 => ['HRM', 'Library.svg'],                12 => ['Knowledge Base', 'Book.svg'],
            13 => ['Documentations', 'Document-Award.svg'], 14 => ['Meeting', 'Book.svg'],
            15 => ['Fleet Management', 'Car.svg'],       16 => ['Accounting', 'Coins.svg'],
            17 => ['CRM', 'Relationships.svg'],          18 => ['Messaging', 'Message.svg'],
            19 => ['Property', 'Home.svg'],              20 => ['School', 'Grad.svg'],
            21 => ['Services', 'Library-1.svg'],         22 => ['Notice Board', 'Bar-Chart-Empty.svg'],
            23 => ['Warehouse', 'Packages.svg'],         24 => ['Transfer', 'Transfers.svg'],
            25 => ['Expenses', 'Expense.svg'],           26 => ['Dashboard', 'Bar-Chart.svg'],
        ];
    @endphp
    <div class="section zubuz-section-padding3" id="apps">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>All the apps your business needs</h2>
            </div>
            <div class="drongo-apps-grid" id="drongo-apps-grid">
                @foreach ($apps as $id => [$title, $icon])
                    <a href="{{ route('DrongoERP.appsDetail', $id) }}" class="drongo-app-card">
                        <img src="{{ asset('images/apps_logo/' . $icon) }}" alt="" width="56" height="56">
                        <span>{{ $title }}</span>
                    </a>
                @endforeach
            </div>
            <div class="drongo-apps-more">
                <button type="button" class="zubuz-default-btn pill" aria-expanded="false" aria-controls="drongo-apps-grid"
                    onclick="var g = document.getElementById('drongo-apps-grid'), open = g.classList.toggle('is-expanded');
                             this.setAttribute('aria-expanded', open);
                             this.querySelector('span').textContent = open ? 'View less' : 'View more';
                             if (!open) document.getElementById('apps').scrollIntoView();">
                    <span>View more</span>
                </button>
            </div>
        </div>
    </div>
    <!-- End Apps Section -->

    <div class="section zubuz-section-padding5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="zubuz-v3-thumb">
                        <img src="{{ asset('/images/v3/thumb-v3-2.png') }}" alt="">
                        <div class="zubuz-v3-card">
                            <img src="{{ asset('/images/v3/card-v3-4.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="zubuz-default-content m-left">
                        <h2>Flexibility to meet your business needs</h2>
                        <p>In today's fast-paced business environment, companies require an ERP software solution that can quickly adapt to their ever-changing market needs. Our ERP software offers unparalleled flexibility, empowering you to run your operations efficiently.</p>
                        <div class="zubuz-extara-mt">
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-icon none-bg">
                                    <img src="{{ asset('/images/v3/icon11.png') }}" alt="">
                                </div>
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Fast implementation:</span>
                                    <p>Our cloud-based solutions can be implemented quickly, often within a few hours, reducing setup time and allowing to start immediately.</p>
                                </div>
                            </div>
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-icon none-bg">
                                    <img src="{{ asset('/images/v3/icon10.png') }}" alt="">
                                </div>
                                <div class="zubuz-iconbox-data data-small">
                                    <span>Accelerated time-to-market:</span>
                                    <p>SaaS tools startups can accelerate their product or service launch and stay ahead of the competition and reach customers faster.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section zubuz-section-padding2 dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 order-lg-2">
                    <div class="zubuz-v3-thumb2">
                        <img src="{{ asset('/images/v3/thumb-v3-3.png') }}" alt="">
                        <div class="zubuz-v3-card2">
                            <img src="{{ asset('/images/v3/card-v3-5.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="zubuz-default-content m-right light">
                        <h2>Cost-effective & simple process</h2>
                        <div class="zubuz-extara-mt">
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-number">
                                    1
                                </div>
                                <div class="zubuz-iconbox-data data-small light">
                                    <span>Subscription-based model:</span>
                                    <p>Our software operates on a subscription-based payment structure, which allows companies to pay for the software on a regular basis.</p>
                                </div>
                            </div>
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-number">
                                    2
                                </div>
                                <div class="zubuz-iconbox-data data-small light">
                                    <span>Cloud hosting:</span>
                                    <p>Cloud-based applications are hosted on cloud servers, eliminating the need for companies to manage their own infrastructure costs.</p>
                                </div>
                            </div>
                            <div class="zubuz-iconbox-wrap-left mw-100">
                                <div class="zubuz-iconbox-number">
                                    3
                                </div>
                                <div class="zubuz-iconbox-data data-small light">
                                    <span>Automated updates and maintenance:</span>
                                    <p>We ensure companies always have access to the latest features and a secure environment by managing software updates, &amp; maintenance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End section -->

    <div class="section dark-bg zubuz-section-padding5">
        <div id="zubuz-counter"></div>
        <div class="container">
            <div class="zubuz-counter-wrap2">
                <div class="zubuz-counter-data light">
                    <h2 class="zubuz-counter-number"><span data-percentage="99.5" class="zubuz-counter"></span><em>%</em></h2>
                    <p>Positive user rating</p>
                </div>
                <div class="zubuz-counter-data light">
                    <h2 class="zubuz-counter-number"><span data-percentage="2" class="zubuz-counter"></span><em>K</em></h2>
                    <p>Monthly active user</p>
                </div>
                <div class="zubuz-counter-data light">
                    <h2 class="zubuz-counter-number"><span data-percentage="100" class="zubuz-counter"></span><em>%</em></h2>
                    <p>Uptime in the last year</p>
                </div>
                <div class="zubuz-counter-data light">
                    <h2 class="zubuz-counter-number"><span data-percentage="100" class="zubuz-counter"></span><em>+</em></h2>
                    <p>Local companies</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section zubuz-section-padding3" id="pricing">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>Rational planning for rapid growth</h2>
                <p>Pick the package that fits today, then switch modules on or off as you grow.</p>
            </div>
            @include('partials.pricing-plans', ['mode' => 'home'])
        </div>
    </div>
    <!-- End Section -->

    <div class="section zubuz-section-padding bg-light" id="testimonials">
        <div class="container">
            <div class="zubuz-section-title zubuz-two-column-title">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Loved by all customers</h2>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center">
                        <div class="zubuz-title-btn">
                            <a class="zubuz-default-btn pill" href="{{ route('DrongoERP.testimonial') }}">
                                <span>Browse all testimonials</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zubuz-video-column">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="zubuz-video-wrap">
                            <img src="{{ asset('/images/v3/video-bg.png') }}" alt="">
                            <a class="video-init zubuz-review-video" href="">
                                <img src="{{ asset('/images/v3/play-btn.svg') }}" alt="">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="zubuz-testimonial-content">
                            <ul>
                                <li><img src="{{ asset('/images/v3/star.png') }}" alt=""></li>
                                <li><img src="{{ asset('/images/v3/star.png') }}" alt=""></li>
                                <li><img src="{{ asset('/images/v3/star.png') }}" alt=""></li>
                                <li><img src="{{ asset('/images/v3/star.png') }}" alt=""></li>
                                <li><img src="{{ asset('/images/v3/star.png') }}" alt=""></li>
                            </ul>
                            <p>"Droongo has revolutionalized our manufacturing processes, providing real-time visibility into production, supply chain, and quality control. This has significantly enhanced our efficiency and reduces our expenses.”</p>
                            <div class="zubuz-testimonial-authors-wraps">
                                <div class="zubuz-testimonial-authors">
                                    <p>Ephrem Birhanu</p>
                                    <span>Owner @EBYes Furniture</span>
                                </div>
                                <div class="zubuz-testimonial-author-logo">
                                    <img src="{{ asset('/images/v2/b_v2_5.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Section -->

    <div class="section zubuz-section-padding3" id="faq">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>Find all the answers to your management problems</h2>
            </div>
            <div class="zubuz-accordion-wrap zubuz-accordion-wrap2" id="zubuz-accordion">
                <div class="zubuz-accordion-item open">
                    <div class="zubuz-accordion-header">
                        <p>Q: What makes Droongo stand out from competitors?</p>
                        <div class="zubuz-active-icon">
                            <img src="{{ asset('/images/v3/') }}plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="{{ asset('/images/v3/') }}minus.png" alt="">
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
                            <img src="{{ asset('/images/v3/') }}plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="{{ asset('/images/v3/') }}minus.png" alt="">
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
                            <img src="{{ asset('/images/v3/') }}plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="{{ asset('/images/v3/') }}minus.png" alt="">
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
                            <img src="{{ asset('/images/v3/') }}plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="{{ asset('/images/v3/') }}minus.png" alt="">
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
                            <img src="{{ asset('/images/v3/') }}plus.png" alt="">
                        </div>
                        <div class="zubuz-inactive-icon">
                            <img src="{{ asset('/images/v3/') }}minus.png" alt="">
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