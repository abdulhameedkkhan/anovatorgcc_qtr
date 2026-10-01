@extends('layouts.app')

@section('title', 'ANOVATOR GCC | Advanced Body Analysis & Health Assessment Systems')
@section('description', 'Smart solutions combining body composition analysis, posture assessment, selected health indicator assessments, and digital reporting for professional use.')
@section('body_class', 'page-home')

@section('content')
<section class="hero" aria-label="Featured systems">
    <div class="hero-shell">
        <div class="hero-viewport">
            <div class="hero-track" id="hero-track">
                <a class="hero-slide is-active" href="{{ route('products.show', 'a5') }}">
                    <img src="{{ asset('images/slider/slide-1.jpg') }}?v=9" alt="Anovator A5 platform" width="1170" height="500" fetchpriority="high" decoding="async">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <p class="hero-kicker">AI-Powered</p>
                            <h2>Redefining the <em>Body Analysis</em> Experience</h2>
                            <p class="hero-lead">Advanced assessment systems using 8-electrode BIA for body composition analysis, posture assessment, body dimensions, selected health indicators, and digital reporting — with a free mobile app and Arabic-language support.</p>
                            <span class="hero-cta-link">Explore Our Systems</span>
                        </div>
                    </div>
                </a>
                <a class="hero-slide hero-slide-products" href="{{ route('products.index') }}">
                    <img src="{{ asset('images/slider/slide-2.jpg') }}?v=9" alt="Anovator body composition systems" width="1170" height="500" loading="lazy" decoding="async">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <p class="hero-kicker">Anovator A5</p>
                            <h2>All-in-one health <em>assessment</em></h2>
                            <p class="hero-lead">Faster results. Clearer insight. Smarter assessment for professional facilities.</p>
                            <span class="hero-cta-link">Discover Anovator A5</span>
                        </div>
                    </div>
                </a>
                <a class="hero-slide hero-slide-products" href="{{ route('products.index') }}#bia">
                    <img src="{{ asset('images/slider/slide-3.jpg') }}?v=9" alt="Smart body composition systems" width="1170" height="500" loading="lazy" decoding="async">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <p class="hero-kicker">Product Range</p>
                            <h2>Smart Body Composition <em>Systems</em></h2>
                            <p class="hero-lead">Multi-category platforms designed for professional assessment, digital reporting, and smoother workflows.</p>
                            <span class="hero-cta-link">View All Systems</span>
                        </div>
                    </div>
                </a>
                <a class="hero-slide hero-slide-map" href="{{ route('contact') }}">
                    <img src="{{ asset('images/slider/slide-4.jpg') }}?v=9" alt="Anovator GCC global reach" width="1170" height="500" loading="lazy" decoding="async">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <p class="hero-kicker">GCC Coverage</p>
                            <h2>Find the right <em>assessment</em> system</h2>
                            <p class="hero-lead">Qatar · UAE · Saudi Arabia · Bahrain · Kuwait · Oman — request a demo with our regional team.</p>
                            <span class="hero-cta-link">Request a Demo</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <button class="hero-peek hero-peek-prev" type="button" data-hero="prev" aria-label="Previous slide"></button>
        <button class="hero-peek hero-peek-next" type="button" data-hero="next" aria-label="Next slide"></button>
        <div class="hero-arrows">
            <button type="button" data-hero="prev" aria-label="Previous">‹</button>
            <button type="button" data-hero="next" aria-label="Next">›</button>
        </div>
        <div class="hero-dots" id="hero-dots">
            <button type="button" class="is-active" aria-label="Slide 1"></button>
            <button type="button" aria-label="Slide 2"></button>
            <button type="button" aria-label="Slide 3"></button>
            <button type="button" aria-label="Slide 4"></button>
        </div>
    </div>
</section>

<section class="stats-strip" aria-label="Global reach">
    @foreach($stats as $stat)
        <div class="stat-cell">
            <strong>{{ $stat['value'] }}</strong>
            <span>{{ $stat['label'] }}</span>
        </div>
    @endforeach
</section>
<p class="stats-trust">Trusted. Proven. Worldwide.</p>

<section class="journey">
    <p class="kicker">Assessment Journey</p>
    <h2>The Anovator Assessment Experience</h2>
    <p class="section-lead section-lead-center">Designed to be — Fast, Clear and Seamless.</p>
    <div class="journey-grid">
        @foreach($journey as $step)
            <article class="journey-step">
                <span>{{ $step['n'] }}</span>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['text'] }}</p>
            </article>
        @endforeach
    </div>
    <p class="section-note section-note-center">A professional assessment experience that builds confidence, supports follow-up, and elevates service value.</p>
</section>

<section class="industry-preview">
    <div class="industry-preview-inner">
        <div class="industry-preview-header">
            <div>
                <p class="kicker">Sectors We Serve</p>
                <h2>One Solution. <em>Multiple Sectors</em></h2>
            </div>
        </div>
        <div class="sector-controls" aria-label="Sector carousel controls">
            <button type="button" class="sector-arrow sector-arrow-prev" data-sector="prev" aria-label="Previous sectors">‹</button>
            <button type="button" class="sector-arrow sector-arrow-next" data-sector="next" aria-label="Next sectors">›</button>
        </div>
        <p class="industry-preview-subtitle">Anovator — Trusted by Professionals. Designed to elevate assessment quality.</p>
        <div class="industry-preview-grid" id="industry-preview-grid">
            @foreach($industries as $industry)
                <a href="{{ route('solutions') }}#{{ $industry['slug'] }}">
                    @if(!empty($industry['icon']))
                        <img class="industry-thumb" src="{{ asset('images/'.$industry['icon']) }}?v=6" alt="" width="72" height="72" loading="lazy" decoding="async">
                    @endif
                    <span>{{ $industry['number'] }}</span>
                    <h3>{{ $industry['title'] }}</h3>
                    <p>{{ $industry['text'] }}</p>
                </a>
            @endforeach
        </div>
        <div class="cta-row">
            <a class="link-arrow" href="{{ route('solutions') }}">View all sectors</a>
        </div>
    </div>
</section>

<section class="awards-block">
    <p class="kicker">Product range</p>
    <h2>Smart Body Composition Analysis Systems</h2>
    <p class="section-lead">Advanced assessment technology for professional use. Multi-category systems designed to support professional assessment, digital reporting, and smoother user experiences across different service environments.</p>
    <div class="awards-track" id="awards-track">
        @foreach($products as $product)
            <a class="award-card" href="{{ route('products.show', $product['slug']) }}">
                <div class="award-visual">
                    @include('partials.device', ['model' => $product['slug']])
                </div>
                <p class="chip">{{ $product['tag'] }}</p>
                <h3>{{ $product['name'] }}</h3>
                <p>{{ $product['headline'] }}</p>
            </a>
        @endforeach
    </div>
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('products.index') }}">Compare all systems</a>
        <a class="link-arrow" href="{{ route('finder') }}">Product finder</a>
    </div>
</section>

<section class="app-split">
    <div class="app-split-copy">
        <p class="kicker">A free app for users</p>
        <h2>Clearer Reports. Better Follow-Up.</h2>
        <p>90% of users found traditional system reports difficult to understand, but found Anovator reports clear and easy to interpret.</p>
        <ul class="plus-list">
            <li>Clear reports designed for easy understanding</li>
            <li>Anytime, anywhere access to results and reports</li>
            <li>Easy review, comparison, and ongoing follow-up of changes over time</li>
            <li>A seamless and organized digital experience across mobile, iPad, and desktop</li>
            <li>Available on iOS and Android</li>
        </ul>
        <div class="cta-row">
            <a class="link-arrow" href="{{ route('support') }}">Digital reporting &amp; support</a>
        </div>
    </div>
    <div class="app-split-photo app-split-gallery">
        <img src="{{ asset('images/photos/rapport-1.jpg') }}?v=5" alt="Anovator report sample 1" loading="lazy" decoding="async">
        <img src="{{ asset('images/photos/rapport-2.jpg') }}?v=5" alt="Anovator report sample 2" loading="lazy" decoding="async">
        <img src="{{ asset('images/photos/rapport-3.jpg') }}?v=5" alt="Anovator report sample 3" loading="lazy" decoding="async">
    </div>
</section>

<section class="certs-block">
    <p class="kicker">Certified &amp; Safe Technology</p>
    <h2 class="section-title">International Certifications. Clinically Trusted Accuracy. Local R&amp;D. Global Reach.</h2>
    <div class="certs-row certs-logos">
        <span class="cert-logo"><img src="{{ asset('images/certified/medical-device.png') }}?v=6" alt="Medical Device" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/cti.png') }}?v=6" alt="CTI" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/class-ii.png') }}?v=6" alt="Class II" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/iso-13485.png') }}?v=6" alt="ISO 13485" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/rohs.png') }}?v=6" alt="RoHS" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/fda.png') }}?v=6" alt="FDA" height="56" loading="lazy" decoding="async"></span>
        <span class="cert-logo"><img src="{{ asset('images/certified/ce.png') }}?v=6" alt="CE" height="56" loading="lazy" decoding="async"></span>
    </div>
    <div class="certs-row certs-row-pills">
        <span class="cert-pill">3-Year Warranty</span>
        <span class="cert-pill">Lifetime Warranty on Software &amp; Updates</span>
    </div>
</section>

<section class="news-block">
    <p class="kicker">Blog</p>
    <h2>Articles &amp; Insights</h2>
    <div class="news-grid">
        @foreach($news as $article)
            <a class="news-card" href="{{ route('blog.show', $article['slug']) }}">
                <div class="news-photo" style="background-image:url('{{ asset('images/'.$article['image']) }}?v=9')"></div>
                <p class="chip chip-spaced">{{ $article['date'] }}</p>
                <h3>{{ $article['title'] }}</h3>
            </a>
        @endforeach
    </div>
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('blog.index') }}">View all articles</a>
    </div>
</section>

<section class="newsletter-block" id="newsletter">
    <div>
        <p class="kicker">Anovator Newsletter –</p>
        <h2>always up-to-date!</h2>
        <p>There is always something new at Anovator GCC. Our newsletter keeps you up to date on systems, training, and regional support. Register now.</p>
    </div>
    <div>
        <h3>Newsletter subscription</h3>
        @if(session('newsletter'))
            <p class="form-success">{{ session('newsletter') }}</p>
        @endif
        <form class="underline-form" method="post" action="{{ route('newsletter.store') }}">
            @csrf
            <label class="hp" aria-hidden="true">Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            <div class="form-row">
                <label>Title</label>
                <select name="title">
                    <option value="">—</option>
                    <option>Mrs.</option>
                    <option>Mr.</option>
                </select>
            </div>
            <div class="form-row two">
                <div>
                    <label>First name *</label>
                    <input type="text" name="first_name" required value="{{ old('first_name') }}">
                </div>
                <div>
                    <label>Last name *</label>
                    <input type="text" name="last_name" required value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="form-row two">
                <div>
                    <label>City</label>
                    <input type="text" name="city" value="{{ old('city') }}">
                </div>
                <div>
                    <label>Country *</label>
                    <select name="country" required>
                        <option value="">Country</option>
                        @foreach($newsletterCountries as $country)
                            <option value="{{ $country }}" @selected(old('country') === $country)>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <label>E-Mail *</label>
                <input type="email" name="email" required value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-note">Our <a href="{{ route('privacy') }}">privacy policy information</a> applies.</p>
            <button class="btn-solid" type="submit">Subscribe</button>
        </form>
    </div>
</section>

<section class="cta-banner" style="background-image:url('{{ asset('images/photos/cta.jpg') }}?v=5')">
    <div>
        <p class="kicker">Anovator GCC</p>
        <h2>Find the Right Assessment System</h2>
        <p>Contact our team to find the right solution for your facility. Qatar · UAE · Saudi Arabia · Bahrain · Kuwait · Oman</p>
        <div class="cta-row">
            <a class="btn-solid" href="{{ route('contact') }}">Request a Demo</a>
            <a class="hero-cta" href="tel:+97450664777">+974 5066 4777</a>
            <a class="hero-cta" href="tel:+97472020005">+974 7202 0005</a>
        </div>
    </div>
</section>
@endsection
