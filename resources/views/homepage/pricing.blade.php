@extends('layout/mainlayout')

@section('page-content')
    <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">Our Pricing Plan</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('DrongoERP.home') }}">Home</a></li>
                    <li aria-current="page"> Our Pricing Plan</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section zubuz-section-padding3">
        <div class="container">
            <div class="zubuz-section-title center">
                <h2>Rational planning for rapid growth</h2>
            </div>
            <div class="pricing-btn">
                <div class="toggle-btn">
                    <label>Monthly </label>
                    <input class="form-check-input btn-toggle price-deck-trigger" type="checkbox" id="flexSwitchCheckDefault" data-pricing-trigger data-target="#table-price-value" checked>
                    <label>Annually</label>
                </div>
            </div>
            <div class="row zubuz-pricing-four-column" id="table-price-value" data-pricing-dynamic data-value-active="monthly">
                <div class="col-xl-3 col-md-6">
                    <div class="zubuz-pricing-wrap">
                        <div class="zubuz-pricing-header">
                            <h5>Free</h5>
                        </div>
                        <div class="zubuz-pricing-price">
                            <h2>$</h2>
                            <div class="zubuz-price dynamic-value" data-active="0" data-monthly="0" data-yearly="19"></div>
                            <p class="dynamic-value" data-active="/Monthly" data-monthly="/monthly" data-yearly="/Yearly"></p>
                        </div>
                        <div class="zubuz-pricing-description">
                            <p>This plan is typically limited in features and usage</p>
                        </div>
                        <div class="zubuz-pricing-body">
                            <p>Free plan includes:</p>
                            <ul>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Basic features</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Limited users & usage</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">No customer support</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">30 day chat history</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">10 Integrations</li>
                            </ul>
                        </div>
                        <a class="zubuz-pricing-btn" href="{{ route('DrongoERP.contact') }}">Try it for free</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="zubuz-pricing-wrap">
                        <div class="zubuz-pricing-header">
                            <h5>Basic</h5>
                        </div>
                        <div class="zubuz-pricing-price">
                            <h2>$</h2>
                            <div class="zubuz-price dynamic-value" data-active="19" data-monthly="19" data-yearly="39"></div>
                            <p class="dynamic-value" data-active="/Monthly" data-monthly="/monthly" data-yearly="/Yearly"></p>
                        </div>
                        <div class="zubuz-pricing-description">
                            <p>A simple and affordable plan only for small businesses</p>
                        </div>
                        <div class="zubuz-pricing-body">
                            <p>Basic plan includes:</p>
                            <ul>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Core features</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Increased limits</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Priority support</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Unlimited chat history</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">20 Integrations</li>
                            </ul>
                        </div>
                        <a class="zubuz-pricing-btn" href="{{ route('DrongoERP.contact') }}">Try it for free</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="zubuz-pricing-wrap active">
                        <div class="zubuz-pricing-header">
                            <h5>Standard</h5>
                        </div>
                        <div class="zubuz-pricing-price">
                            <h2>$</h2>
                            <div class="zubuz-price dynamic-value" data-active="29" data-monthly="29" data-yearly="59"></div>
                            <p class="dynamic-value" data-active="/Monthly" data-monthly="/monthly" data-yearly="/Yearly"></p>
                        </div>
                        <div class="zubuz-pricing-description">
                            <p>This plan is geared toward growing businesses</p>
                        </div>
                        <div class="zubuz-pricing-body">
                            <p>Standard plan includes:</p>
                            <ul>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Expanded features</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Increased users</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Priority email support</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Unlimited chat history</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">30 Integrations</li>
                            </ul>
                        </div>
                        <a class="zubuz-pricing-btn active" href="{{ route('DrongoERP.contact') }}">Try it for free</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="zubuz-pricing-wrap">
                        <div class="zubuz-pricing-header">
                            <h5>Enterprise</h5>
                        </div>
                        <div class="zubuz-pricing-price">
                            <h2>$</h2>
                            <div class="zubuz-price dynamic-value" data-active="59" data-monthly="59" data-yearly="99"></div>
                            <p class="dynamic-value" data-active="/Monthly" data-monthly="/monthly" data-yearly="/Yearly"></p>
                        </div>
                        <div class="zubuz-pricing-description">
                            <p>Tailored to the unique needs of large enterprises</p>
                        </div>
                        <div class="zubuz-pricing-body">
                            <p>Enterprise plan includes:</p>
                            <ul>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Customized features</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Scalability & security </li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Account manager</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">Unlimited chat history</li>
                                <li><img src="{{ asset('/images/v3/check.png') }}" alt="">50 Integrations</li>
                            </ul>
                        </div>
                        <a class="zubuz-pricing-btn" href="{{ route('DrongoERP.contact') }}">Try it for free</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->

    <div class="zubuz-divider"></div>

    <div class="section zubuz-section-padding3">
        <div class="container">
            <div class="zubuz-section-title zubuz-two-column-title">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Wide range of SaaS solutions</h2>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center">
                        <p>Discovered our all customized services and you can double, triple, or quadruple your income & beat your competition with professional services!</p>
                    </div>
                </div>
            </div>

            <div class="zubuz-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Feature Name:</th>
                            <th>Starter</th>
                            <th>Business</th>
                            <th>Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Users</td>
                            <td>Up to 15 users</td>
                            <td>Up to 20 users</td>
                            <td>Up to 100 users</td>
                        </tr>
                        <tr>
                            <td>File storage</td>
                            <td>2 GB</td>
                            <td>5 GB</td>
                            <td>10 GB</td>
                        </tr>
                        <tr>
                            <td>Premium supports</td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Secure transfer</td>
                            <td><img src="{{ asset('/images/icon/minus.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/minus.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Statistics and tracking</td>
                            <td><img src="{{ asset('/images/icon/minus.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td>File size limit</td>
                            <td>100 MB</td>
                            <td>1 GB</td>
                            <td>1 GB</td>
                        </tr>
                        <tr>
                            <td>Mobile app</td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                            <td><img src="{{ asset('/images/icon/check.svg') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a class="zubuz-default-btn" href="{{ route('DrongoERP.contact') }}"><span>Get Started Now</span></a></td>
                            <td><a class="zubuz-default-btn" href="{{ route('DrongoERP.contact') }}"><span>Get Started Now</span></a></td>
                            <td><a class="zubuz-default-btn" href="{{ route('DrongoERP.contact') }}"><span>Get Started Now</span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Section -->
@endsection