<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle ?? 'DrongoERP — Convenience at your fingertips!' }}</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">
        <!--- End favicon-->

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Raleway:wght@600;700&display=swap" rel="stylesheet">
        <!-- End google font  -->

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/fontawesome.css') }}">


        <!-- Code Editor  -->
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
        
    </head>

    <body class="light">

        <div class="zubuz-preloader-wrap">
            <div class="zubuz-preloader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <?php if ($page === 'home') : ?>
            <header class="site-header site-header--menu-center zubuz-header-section" id="sticky-menu">
                <div class="container">
                    <nav class="navbar site-navbar">

                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('DrongoERP.home') }}">
                                <img src="{{ asset('/images/logo/logo-dark.png') }}" alt="" class="light-version-logo">
                            </a>
                        </div>

                        <div class="menu-block-wrapper">
                            <div class="menu-overlay"></div>
                            <nav class="menu-block" id="append-menu-header">
                                <div class="mobile-menu-head">
                                    <div class="go-back">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="current-menu-title"></div>
                                    <div class="mobile-menu-close">&times;</div>
                                </div>
                                <ul class="site-menu-main">
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#home" class="nav-link-item">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#about" class="nav-link-item">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#apps" class="nav-link-item">Apps</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#pricing" class="nav-link-item">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#testimonials" class="nav-link-item">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.contact') }}" class="nav-link-item">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="zubuz-header-btn-wrap">
                                <a class="zubuz-default-btn zubuz-header-btn pill" href="{{ route('DrongoERP.home') }}"><span>Login</span></a>
                            </div>

                            <a class="zubuz-default-btn zubuz-header-btn pill" href="{{ route('DrongoERP.getStarted') }}">
                                <span>Get Started</span>
                            </a>

                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger light">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>
            </header>
            <!--End landex-header-section -->
        <?php endif; ?>

        <?php if ($page !== 'home') : ?>
            <header class="site-header site-header--menu-center zubuz-header-section dark-bg white-menu" id="sticky-menu">
                <div class="container">
                    <nav class="navbar site-navbar">
                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('DrongoERP.home') }}">
                                <img src="{{ asset('/images/logo/logo-white.png') }}" alt="" class="light-version-logo">
                            </a>
                        </div>
                        <div class="menu-block-wrapper">
                            <div class="menu-overlay"></div>
                            <nav class="menu-block" id="append-menu-header">
                                <div class="mobile-menu-head">
                                    <div class="go-back">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="current-menu-title"></div>
                                    <div class="mobile-menu-close">&times;</div>
                                </div>
                                <ul class="site-menu-main">
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#home" class="nav-link-item">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#about" class="nav-link-item">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#apps" class="nav-link-item">Apps</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#pricing" class="nav-link-item">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.home') }}#testimonials" class="nav-link-item">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('DrongoERP.contact') }}" class="nav-link-item">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="zubuz-header-btn-wrap">
                                <a class="zubuz-default-btn zubuz-header-btn" href="{{ route('DrongoERP.home') }}"><span>Login</span></a>
                            </div>
                            <a class="zubuz-default-btn zubuz-header-btn" href="{{ route('DrongoERP.getStarted')}}">
                                <span>Get Started</span>
                            </a>
                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger light">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>
            </header>
            <!--End landex-header-section -->
        <?php endif; ?>

        @yield('page-content')

        <?php if ($page === 'home') : ?>
            <!-- Footer  -->
            <footer class="zubuz-footer-section dark-bg">
                <div class="container">
                    <div class="zubuz-footer-extra-top">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="zubuz-footer-extra-title">
                                    <h2>Take your business to the next level</h2>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="zubuz-footer-btn">
                                    <a class="zubuz-default-btn pill" href="{{ route('DrongoERP.getStarted') }}"><span>Get started now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="zubuz-footer-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                                <div class="zubuz-footer-textarea light">
                                    <a href="{{ route('DrongoERP.home') }}">
                                        <img src="{{ asset('/images/logo/logo-white.png') }}" alt="">
                                    </a>
                                    <p>We're your innovation partner, delivering cutting-edge solutions that elevate your business to the next level.</p>
                                    <div class="zubuz-social-icon social-box social-box-white">
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
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu light extar-margin">
                                    <div class="zubuz-footer-title light">
                                        <p>Navigation</p>
                                    </div>
                                    <ul>
                                        <li><a href="https://demo.drongoerp.com/" target="_blank">Live Demo</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#about">About Us</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#services">Services</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#pricing">Pricing</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4">
                                <div class="zubuz-footer-menu light">
                                    <div class="zubuz-footer-title light">
                                        <p>Utility pages</p>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('DrongoERP.home') }}#faq">Instructions</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu light info extar-margin">
                                    <div class="zubuz-footer-title light">
                                        <p>Contact us</p>
                                    </div>
                                    <ul>
                                        <li><a href="tel:+251907778899"><img src="{{ asset('/images/icon/call.svg') }}" alt="">+251-90-777-8899</a></li>
                                        <li><a href="mailto:info@drongoerp.com"><img src="{{ asset('/images/icon/email.svg') }}" alt="">info@drongoerp.com</a></li>
                                        <li><a href="https://maps.app.goo.gl/zpgJ9N7XVS5oStmG9" target="_blank"><img src="{{ asset('/images/icon/map.svg') }}" alt="">Namibia Street, Bole, Addis Ababa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zubuz-footer-bottom center light">
                        <div class="zubuz-copywright light">
                            <p> &copy; Copyright 2024, All Rights Reserved by Drongo Technology</p>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif; ?>

        <?php if ($page !== 'home') : ?>
            <!-- Footer -->
            <footer class="zubuz-footer-section main-footer">
                <div class="container">
                    <div class="zubuz-footer-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                                <div class="zubuz-footer-textarea">
                                    <a href="{{ route('DrongoERP.home') }}">
                                        <img src="{{ asset('/images/logo/logo-dark.png') }}" alt="">
                                    </a>
                                    <p>We're your innovation partner, delivering cutting-edge solutions that elevate your business to the next level.</p>
                                    <div class="zubuz-subscribe-one">
                                        <form action="#">
                                            <input type="email" placeholder="Email Address">
                                            <button class="zubuz-default-btn zubuz-subscription-btn one" id="zubuz-subscription-btn" type="submit">
                                                <span>Subscribe</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu extar-margin">
                                    <div class="zubuz-footer-title">
                                        <p>Navigation</p>
                                    </div>
                                    <ul>
                                        <li><a href="https://demo.drongoerp.com/" target="_blank">Live Demo</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#about">About Us</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#services">Services</a></li>
                                        <li><a href="{{ route('DrongoERP.home') }}#pricing">Pricing</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4">
                                <div class="zubuz-footer-menu">
                                    <div class="zubuz-footer-title">
                                        <p>Utility pages</p>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('DrongoERP.home') }}#faq">Instructions</a></li>
                                        <li><a href="{{ route('DrongoERP.contact') }}">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="zubuz-footer-menu info extar-margin">
                                    <div class="zubuz-footer-title">
                                        <p>Contact us</p>
                                    </div>
                                    <ul>
                                        <li><a href="tel:+251907778899"><img src="{{ asset('/images/icon/call.svg') }}" alt="">+251-90-777-8899</a></li>
                                        <li><a href="mailto:info@drongoerp.com"><img src="{{ asset('/images/icon/email.svg') }}" alt="">info@drongoerp.com</a></li>
                                        <li><a href="https://maps.app.goo.gl/zpgJ9N7XVS5oStmG9" target="_blank"><img src="{{ asset('/images/icon/map.svg') }}" alt="">Namibia Street, Bole, Addis Ababa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zubuz-footer-bottom">
                        <div class="zubuz-social-icon order-md-2">
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
                        <div class="zubuz-copywright">
                            <p> &copy; Copyright 2024, All Rights Reserved by Drongo Technology</p>
                        </div>
                    </div>

                </div>
            </footer>
        <?php endif; ?>
        <!-- scripts -->
        <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/js/menu/menu.js') }}"></script>
        <script src="{{ asset('/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/js/slick.js') }}"></script>
        <script src="{{ asset('/js/countdown.js') }}"></script>
        <script src="{{ asset('/js/wow.min.js') }}"></script>
        <script src="{{ asset('/js/faq.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        
       {{--Business type other and list--}}
        <script>
            document.getElementById('businessType').addEventListener('change', function () {
                const selectedValue = this.value;
                const selectedText = this.options[this.selectedIndex].text;

                const otherTypeInput = document.getElementById('otherTypeInput');
                if (selectedValue === 'otherBusinessType') {
                    otherTypeInput.style.display = 'block';
                } else {
                    otherTypeInput.style.display = 'none';

                    const selectedList = document.getElementById('selectedBusinessTypes');
                    const items = selectedList.getElementsByTagName('li');

                    for (let i = 0; i < items.length; i++) {
                        if (items[i].textContent.replace("✖", "").trim() === selectedText) {
                            return;
                        }
                    }

                    const listItem = document.createElement('li');
                    listItem.textContent = selectedText;

                    const cancelButton = document.createElement('span');
                    cancelButton.textContent = ' ✖';
                    cancelButton.style.color = 'red';
                    cancelButton.style.cursor = 'pointer';
                    cancelButton.style.marginLeft = '10px';

                    cancelButton.addEventListener('click', function () {
                        selectedList.removeChild(listItem);
                    });

                    listItem.appendChild(cancelButton);

                    selectedList.appendChild(listItem);
                }
            });
                function updateBusinessTypeHiddenInput() {
                    const selectedList = document.getElementById('selectedBusinessTypes');
                    const items = selectedList.getElementsByTagName('li');
                    const values = [];

                    for (let i = 0; i < items.length; i++) {
                        values.push(items[i].textContent.replace("✖", "").trim()); 
                    }

                    const hiddenInput = document.getElementById('selectedBusinessTypesHidden');
                    hiddenInput.value = JSON.stringify(values);

                    console.log("Hidden Input Value:", hiddenInput.value);
                }
                document.getElementById('submitForm').addEventListener('submit', function () {
                    updateBusinessTypeHiddenInput();
                });

            document.getElementById('businessGroup').addEventListener('change', function () {
                const selectedValue = this.value;
                const selectedText = this.options[this.selectedIndex].text;

                const otherGroupInput = document.getElementById('otherGroupInput');
                if (selectedValue === 'otherBusinessGroup') {
                    otherGroupInput.style.display = 'block';
                } else {
                    otherGroupInput.style.display = 'none';

                    const selectedList = document.getElementById('selectedBusinessGroups');
                    const items = selectedList.getElementsByTagName('li');

                    for (let i = 0; i < items.length; i++) {
                        if (items[i].textContent.replace("✖", "").trim() === selectedText) {
                            return;
                        }
                    }

                    const listItem = document.createElement('li');
                    listItem.textContent = selectedText;

                    const cancelButton = document.createElement('span');
                    cancelButton.textContent = ' ✖';
                    cancelButton.style.color = 'red';
                    cancelButton.style.cursor = 'pointer';
                    cancelButton.style.marginLeft = '10px';

                    cancelButton.addEventListener('click', function () {
                        selectedList.removeChild(listItem);
                    });

                    listItem.appendChild(cancelButton);

                    selectedList.appendChild(listItem);
                }
            });
                function updateBusinessGroupHiddenInput() {
                    const selectedList = document.getElementById('selectedBusinessGroups');
                    const items = selectedList.getElementsByTagName('li');
                    const values = [];

                    for (let i = 0; i < items.length; i++) {
                        values.push(items[i].textContent.replace("✖", "").trim()); 
                    }

                    const hiddenInput = document.getElementById('selectedBusinessGroupsHidden');
                    hiddenInput.value = JSON.stringify(values);

                    console.log("Hidden Input Value:", hiddenInput.value);
                }
                document.getElementById('submitForm').addEventListener('submit', function () {
                    updateBusinessGroupHiddenInput();
                });

            document.getElementById('businessIndustry').addEventListener('change', function () {
                const selectedValue = this.value;
                const selectedText = this.options[this.selectedIndex].text;

                const otherIndustryInput = document.getElementById('otherIndustryInput');
                if (selectedValue === 'otherBusinessIndustry') {
                    otherIndustryInput.style.display = 'block';
                } else {
                    otherIndustryInput.style.display = 'none';

                    const selectedList = document.getElementById('selectedBusinessIndustrys');
                    const items = selectedList.getElementsByTagName('li');

                    for (let i = 0; i < items.length; i++) {
                        if (items[i].textContent.replace("✖", "").trim() === selectedText) {
                            return;
                        }
                    }

                    const listItem = document.createElement('li');

                    listItem.textContent = selectedText;

                    const cancelButton = document.createElement('span');
                    cancelButton.textContent = ' ✖';
                    cancelButton.style.color = 'red';
                    cancelButton.style.cursor = 'pointer';
                    cancelButton.style.marginLeft = '10px';

                    cancelButton.addEventListener('click', function () {
                        selectedList.removeChild(listItem);
                    });

                    listItem.appendChild(cancelButton);

                    selectedList.appendChild(listItem);
                }
            });

                function updateBusinessIndustryHiddenInput() {
                    const selectedList = document.getElementById('selectedBusinessIndustrys');
                    const items = selectedList.getElementsByTagName('li');
                    const values = [];

                    for (let i = 0; i < items.length; i++) {
                        values.push(items[i].textContent.replace("✖", "").trim()); 
                    }

                    const hiddenInput = document.getElementById('selectedBusinessIndustrysHidden');
                    hiddenInput.value = JSON.stringify(values);

                    console.log("Hidden Input Value:", hiddenInput.value);
                }
                document.getElementById('submitForm').addEventListener('submit', function () {
                    updateBusinessIndustryHiddenInput();
                });

        </script>

        {{--Select Option to Business Type--}}
        <script>
            function handleDropdownChange(selectField) {
            const firstOption = selectField.querySelector("option[value='']");
            selectField.addEventListener("change", function () {
                if (this.value !== "") {
                firstOption.selected = true; 
                }
            });
            }
        
            const businessIndustry = document.getElementById("businessIndustry");
            const businessType = document.getElementById("businessType");
            const businessGroup = document.getElementById("businessGroup");
        
            handleDropdownChange(businessIndustry);
            handleDropdownChange(businessType);
            handleDropdownChange(businessGroup);
        </script>
        
        {{--Existing System Input--}}
        <script>    
            document.addEventListener('DOMContentLoaded', function() {
                const substituteRadio = document.getElementById('substitute');
                const newSystemRadio = document.getElementById('newSystem');
                const existingSystemInput = document.getElementById('existingSystemInput');
        
                if (substituteRadio.checked) {
                    existingSystemInput.style.display = 'block';
                } else {
                    existingSystemInput.style.display = 'none';
                }
        
                substituteRadio.addEventListener('change', function() {
                    if (this.checked) {
                        existingSystemInput.style.display = 'block';
                    }
                });
        
                newSystemRadio.addEventListener('change', function() {
                    if (this.checked) {
                        existingSystemInput.style.display = 'none';
                    }
                });
            });
        </script>

        {{-- Prevent enter key from form submission --}}
        <script>
            document.getElementById('companyProfileForm').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); 
                console.log('Enter key pressed!');
            }
            });
        </script>
       
        {{--Country Name Fetch--}}
        <script>
            fetch("https://restcountries.com/v3.1/all")
                .then(response => response.json())
                .then(data => {
                    const countrySelect = document.getElementById("country");
                    
                    const sortedCountries = data
                        .map(country => country.name.common)
                        .sort((a, b) => a.localeCompare(b)); 

                    sortedCountries.forEach(countryName => {
                        const option = document.createElement("option");
                        option.value = countryName;
                        option.textContent = countryName;
                        countrySelect.appendChild(option);
                    });
                })
            .catch(error => console.error("Error fetching country data:", error));
        </script>

        {{--Country phone number fetch--}}
        <script>
            const countryCodeSelect = document.getElementById("countryCode");
            const countryNameInput = document.getElementById("countryName");

            fetch("https://restcountries.com/v3.1/all")
                .then(response => response.json())
                .then(data => {
                    const countries = data
                        .map(country => ({
                            name: country.name.common,
                            code: country.idd?.root + (country.idd?.suffixes?.[0] || "")
                        }))
                        .filter(country => country.code)
                        .sort((a, b) => a.name.localeCompare(b.name));

                    countries.forEach(country => {
                        const option = document.createElement("option");
                        option.value = country.code;
                        option.textContent = `${country.code} - ${country.name}`;
                        option.dataset.countryName = country.name; 
                        countryCodeSelect.appendChild(option);
                    });

                    const defaultCountryCode = '+251';
                    countryCodeSelect.value = defaultCountryCode;
                    countryNameInput.value = countries.find(c => c.code === defaultCountryCode)?.name || "";

                })
                .catch(error => console.error("Error fetching countries:", error));

            countryCodeSelect.addEventListener("change", function () {
                const selectedOption = countryCodeSelect.options[countryCodeSelect.selectedIndex];
                countryNameInput.value = selectedOption.dataset.countryName;
            });

        </script>

        {{--Client Logo--}}
        <script>
           document.addEventListener("DOMContentLoaded", function () {
            const sliderTrack = document.querySelector(".slider-track");
            const slides = document.querySelectorAll(".slide");

            slides.forEach(slide => {
                const clone = slide.cloneNode(true);
                sliderTrack.appendChild(clone);
            });
            });
        </script>
        
        {{--Testimonial Videos with dots--}}
        <script>
            $(document).ready(function () {
                const $videoTrack = $('.video-track');
                const $videos = $('.zubuz-video-column');
                const videoWidth = 100; 
                const totalVideos = $videos.length; 
        
                const $firstClone = $videos.first().clone();
                const $lastClone = $videos.last().clone();
        
                $videoTrack.append($firstClone);
                $videoTrack.prepend($lastClone);
        
                $videoTrack.css('transform', `translateX(-${videoWidth}%)`);
        
                let currentIndex = 0;
        
                const $dotsContainer = $('.video-dots'); 
                for (let i = 0; i < totalVideos; i++) {
                    $dotsContainer.append('<span class="dot"></span>');
                }
        
                const $dots = $('.dot');
                $dots.eq(currentIndex).addClass('active'); 
        
                function updateDots() {
                    $dots.removeClass('active');
                    $dots.eq(currentIndex).addClass('active');
                }
        
                function slideVideos() {
                    currentIndex++;
        
                    $videoTrack.css({
                        transition: 'transform 1s ease-in-out',
                        transform: `translateX(-${(currentIndex + 1) * videoWidth}%)`,
                    });
        
                    updateDots();
        
                    if (currentIndex === totalVideos) {
                        setTimeout(() => {
                            $videoTrack.css({
                                transition: 'none', 
                                transform: `translateX(-${videoWidth}%)`,
                            });
                            currentIndex = 0; 
                            updateDots(); 
                        }, 1000); 
                    }
                }
        
                let slideInterval = setInterval(slideVideos, 5000); 
        
                $dots.click(function () {
                    const clickedIndex = $(this).index(); 
                    currentIndex = clickedIndex;
        
                    $videoTrack.css({
                        transition: 'transform 1s ease-in-out',
                        transform: `translateX(-${(currentIndex + 1) * videoWidth}%)`,
                    });
        
                    updateDots();
                });
        
                $videos.on('mouseenter', function () {
                    clearInterval(slideInterval);
                });
        
                $videos.on('mouseleave', function () {
                    slideInterval = setInterval(slideVideos, 5000); 
                });
            });
        </script>
        
        {{--app detail images--}}
        <script>
            function createSlider(selector) {
                const images = document.querySelectorAll(selector);
                let currentIndex = 0;

                function showImage(index) {
                    images.forEach((img, i) => {
                        img.style.opacity = i === index ? "1" : "0";
                        img.style.zIndex = i === index ? "1" : "-1";
                    });
                }

                images[currentIndex].style.opacity = "1";
                images[currentIndex].style.zIndex = "1";

                setInterval(() => {
                    const previousIndex = currentIndex;
                    currentIndex = (currentIndex + 1) % images.length;

                    images[previousIndex].style.zIndex = "0";
                    images[currentIndex].style.zIndex = "1";

                    images[currentIndex].style.opacity = "1";
                    images[previousIndex].style.opacity = "0";
                }, 5000);

                showImage(currentIndex);
            }

            createSlider(".slider-img");
            createSlider(".slider-img-module");
        </script>

        {{-- Modules in app detail--}}
        <script>
            document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const target = button.dataset.target;

                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

                button.classList.add('active');
                document.getElementById(target).classList.add('active');
            });
            });
        </script> 




