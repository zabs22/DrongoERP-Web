@php
    $customers = ['alhikma' => 'alHikma', 'alzom' => 'Alzom', 'andegna' => 'Andegna Furniture', 'habar' => 'Habar Consulting', 'likhi' => 'Likhi Trading', 'oro-fresh' => 'Oro-fresh', 'radbest' => 'RadBest'];
    $highlights = ['E-Invoicing', 'Cloud ERP', 'Full Automation', 'Rapid Deployment', 'Dedicated Support', 'In-Depth Analytics', 'Data Security', 'Cost-Effective ERP'];
    $solutions = [
        ['Standalone E-Invoice', 'Deploy our robust standalone E-Invoice solution and meet regulatory requirements quickly, without waiting for complex system changes.'],
        ['Seamless Integration', 'Connect our E-Invoice solution with your existing ERP or accounting system and stay compliant while keeping your current operations running smoothly.'],
        ['Complete ERP Solution', 'Upgrade to our customizable ERP system, fully integrated with our E-Invoice solution to manage your business and compliance in one place.'],
    ];
    $features = [
        ['fa-chart-line', 'Enterprise Resource Planning', 'Generate accurate reports and access real-time insights to make faster, smarter business decisions.'],
        ['fa-desktop', 'Modern, intuitive interface', 'Access a clean, easy-to-use system designed to simplify everyday business operations.'],
        ['fa-cogs', 'Powerful automation', 'Automate repetitive tasks and workflows to reduce manual work, minimize errors, and improve productivity.'],
        ['fa-sliders-h', 'Flexible management tools', 'Manage, update, and organize your business data, processes, and operations from one centralized platform.'],
        ['fa-shield-alt', 'Secure and reliable', 'Keep your business and customer information protected with robust security and privacy measures.'],
        ['fa-sync-alt', 'Continuous improvements', 'Benefit from regular updates, enhancements, and new features designed to keep your business running efficiently.'],
    ];
    $services = [
        ['fa-headset', 'Customer support', 'Enjoy top-tier ongoing customer support in the city.'],
        ['fa-rocket', 'Free trial', 'Experience our system with a complimentary free trial.'],
        ['fa-lightbulb', 'Deeper insights', 'Get a deeper understanding of your business performance.'],
        ['fa-award', 'Proven track record', 'We have a track record of successful client partnerships.'],
        ['fa-coins', 'Accounting and finance', 'Accounting software that helps with your financial reports.'],
        ['fa-database', 'Data security', 'Benefit from robust security measures and data backup.'],
    ];
@endphp

<header class="dg-hero" id="home">
    <div class="dg-hero__grid" aria-hidden="true"></div>
    <div class="dg-hero__glow" aria-hidden="true"></div>
    <div class="container dg-hero__content">
        <span class="dg-badge">Enterprise Resource Planning</span>
        <h1 class="dg-title">Elevate your success with Droongo</h1>
        <p class="dg-lead">We deliver innovative enterprise solutions, AI-powered technologies, and digital transformation services that help organizations grow, operate smarter, and shape a better tomorrow.</p>
        <ul class="dg-checks">
            <li><i class="fas fa-check" aria-hidden="true"></i> Intelligent solution</li>
            <li><i class="fas fa-check" aria-hidden="true"></i> Get your own team of professionals</li>
            <li><i class="fas fa-check" aria-hidden="true"></i> 7-day free trial</li>
        </ul>
        <div class="dg-hero__actions">
            <a class="dg-btn dg-btn--primary" href="https://demo.drongoerp.com/" target="_blank" rel="noopener">Live Demo</a>
            <a class="dg-btn dg-btn--glow" href="{{ route('DrongoERP.contact') }}">Contact Us</a>
        </div>
    </div>
    <div class="dg-customers">
        <div class="container dg-customers__row">
            <span>Our customers include</span>
            <ul>
                @foreach ($customers as $file => $name)
                    <li><img src="{{ asset('images/partners/' . $file . '.png') }}" alt="{{ $name }}" loading="lazy"></li>
                @endforeach
            </ul>
        </div>
    </div>
</header>

<section class="dg-section dg-transform">
    <div class="container dg-transform__row">
        <div>
            <h2 class="dg-title dg-title--md">Transform <span class="dg-accent">Your Business</span></h2>
            <p>Empower your team, streamline processes, and accelerate growth with our all-in-one cloud-based ERP system designed to adapt to your unique business needs.</p>
        </div>
        <div class="dg-ticker" aria-label="{{ implode(', ', $highlights) }}">
            <div class="dg-ticker__track" aria-hidden="true">
                @foreach ([...$highlights, ...$highlights] as $item)
                    <span>{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="dg-section" id="services">
    <div class="container">
        <div class="dg-heading">
            <span class="dg-badge">E-Invoicing &amp; ERP Solutions</span>
            <h2 class="dg-title dg-title--md">Flexible Solutions for Your <span class="dg-accent">Digital</span> Business</h2>
            <p>Whether you need a standalone E-Invoice solution, seamless ERP integration, or a complete business management system, we have the right solution for you.</p>
        </div>
        <div class="dg-solutions">
            @foreach ($solutions as $i => [$title, $text])
                <article class="dg-card dg-card--center">
                    <span class="dg-icon"><span class="dg-accent">0{{ $i + 1 }}</span></span>
                    <h3>{{ $title }}</h3>
                    <p>{{ $text }}</p>
                    <img class="dg-card__step" src="{{ asset('images/services/step-' . ['a', 'b', 'c'][$i] . '.png') }}" alt="" loading="lazy">
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="dg-section" id="features">
    <div class="container dg-features">
        <div class="dg-features__intro">
            <span class="dg-icon"><i class="fas fa-layer-group dg-accent" aria-hidden="true"></i></span>
            <h2 class="dg-title dg-title--md">Powerful Features to Streamline Your Business</h2>
            <p>Manage, automate, and optimize your business operations with powerful ERP tools designed to save time, improve efficiency, and help your organization grow.</p>
            <a class="dg-btn dg-btn--glow" href="{{ auth()->check() ? route('dashboard') : route('DrongoERP.getStarted') }}">
                {{ auth()->check() ? 'Go to your dashboard' : 'Register Your Business Now' }}
            </a>
        </div>
        <div class="dg-features__list">
            @foreach ($features as $i => [$icon, $title, $text])
                <article class="dg-card">
                    <i class="fas {{ $icon }} dg-accent dg-card__icon" aria-hidden="true"></i>
                    <h3>{{ $title }}</h3>
                    <p>{{ $text }}</p>
                    <img class="dg-card__feature" src="{{ asset('images/services/feature-' . ($i + 1) . '.png') }}" alt="" loading="lazy">
                </article>
            @endforeach
        </div>
    </div>
    <div class="container dg-services">
        <h3 class="dg-title dg-title--sm">Everything You Need to Run Your Business Smarter</h3>
        <div class="dg-services__grid">
            @foreach ($services as [$icon, $title, $text])
                <div>
                    <i class="fas {{ $icon }} dg-accent" aria-hidden="true"></i>
                    <h4>{{ $title }}</h4>
                    <p>{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
