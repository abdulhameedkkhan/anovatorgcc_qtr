@extends('layouts.app')

@section('title', 'Anovator GCC | Medical measurement systems')
@section('description', 'Advanced 8-electrode BIA body composition analysis systems for professional use across the GCC. Explore Anovator A5, M3, M1, and M0.')

@section('content')
<section class="hero" aria-label="Featured systems">
    <div class="hero-shell">
        <div class="hero-viewport">
            <div class="hero-track" id="hero-track">
                <a class="hero-slide is-active" href="{{ route('products.show', 'a5') }}">
                    <img src="{{ asset('images/slider/slide-1.jpg') }}?v=2" alt="Anovator A5" width="1170" height="500">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <h2>Anovator A5</h2>
                            <h3>The Game Changer in Patient Care</h3>
                        </div>
                    </div>
                </a>
                <a class="hero-slide" href="{{ route('products.show', 'm3') }}">
                    <img src="{{ asset('images/slider/slide-2.jpg') }}?v=2" alt="Anovator M3" width="1170" height="500">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <h2>Anovator M3</h2>
                            <h3>A New Dimension in Patient Care</h3>
                        </div>
                    </div>
                </a>
                <a class="hero-slide" href="{{ route('products.index') }}#bia">
                    <img src="{{ asset('images/slider/slide-3.jpg') }}?v=2" alt="BIA solutions" width="1170" height="500">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <h2>BIA solutions</h2>
                            <h3>Insights from the inside out</h3>
                        </div>
                    </div>
                </a>
                <a class="hero-slide" href="{{ route('finder') }}">
                    <img src="{{ asset('images/slider/slide-4.jpg') }}?v=2" alt="Product finder" width="1170" height="500">
                    <div class="hero-copy">
                        <div class="hero-copy-inner">
                            <h2>Product finder</h2>
                            <h3>Definitely the right product. Guaranteed!</h3>
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

<section class="tile-grid bento">
    <a class="tile has-photo tile-featured" href="{{ route('products.show', 'a5') }}" style="background-image:url('{{ asset('images/photos/tile-clinic.jpg') }}')">
        <div class="tile-visual">
            @include('partials.device', ['model' => 'a5'])
        </div>
        <div class="tile-copy">
            <h2>Anovator A5</h2>
            <h3>Insights from the inside out</h3>
        </div>
    </a>
    <a class="tile has-photo" href="{{ route('products.show', 'm3') }}" style="background-image:url('{{ asset('images/photos/tile-lab.jpg') }}')">
        <div class="tile-visual">
            @include('partials.device', ['model' => 'm3'])
        </div>
        <div class="tile-copy">
            <h2>Anovator M3</h2>
            <h3>A New Dimension in Patient Care</h3>
        </div>
    </a>
    <a class="tile tile-finder" href="{{ route('finder') }}">
        <div class="tile-visual tile-icon-visual">
            <svg viewBox="0 0 280 220" aria-hidden="true">
                <circle cx="132" cy="110" r="78" fill="none" stroke="#111315" stroke-width="1.4"/>
                <circle cx="132" cy="110" r="48" fill="none" stroke="#111315" stroke-width="1.2"/>
                <circle cx="132" cy="110" r="18" fill="none" stroke="#EF0A6A" stroke-width="2"/>
                <path d="M186 164 L248 214" fill="none" stroke="#111315" stroke-width="3"/>
                <circle cx="248" cy="214" r="6" fill="#EF0A6A"/>
            </svg>
        </div>
        <div class="tile-copy">
            <h2>Product finder</h2>
            <h3>Definitely the right product. Guaranteed!</h3>
        </div>
    </a>
    <a class="tile has-photo tile-service-photo" href="{{ route('support') }}" style="background-image:url('{{ asset('images/photos/tile-service.jpg') }}')">
        <div class="tile-copy">
            <h2>Anovator service</h2>
            <h3>24/7 technical support across the GCC</h3>
        </div>
    </a>
</section>

<section class="stats-strip">
    @foreach($stats as $stat)
        <div class="stat-cell">
            <strong>{{ $stat['value'] }}</strong>
            <span>{{ $stat['label'] }}</span>
        </div>
    @endforeach
</section>

<section class="journey">
    <p class="kicker">Assessment journey</p>
    <h2>Designed to be fast, clear and seamless</h2>
    <div class="journey-grid">
        @foreach($journey as $step)
            <article class="journey-step">
                <span>{{ $step['n'] }}</span>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['text'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="industry-preview">
    <div class="industry-preview-inner">
        <p class="kicker">Industries we serve</p>
        <h2>One solution. Multiple sectors.</h2>
        <div class="industry-preview-grid">
            @foreach($industries as $industry)
                <a href="{{ route('industries') }}#{{ $industry['slug'] }}">
                    <span>{{ $industry['number'] }}</span>
                    <h3>{{ $industry['title'] }}</h3>
                    <p>{{ $industry['text'] }}</p>
                </a>
            @endforeach
        </div>
        <div class="cta-row">
            <a class="link-arrow" href="{{ route('industries') }}">View all industries</a>
        </div>
    </div>
</section>

<section class="app-split">
    <div class="app-split-copy">
        <p class="kicker">Free mobile app</p>
        <h2>Clearer reports. Better follow-up.</h2>
        <p>Users access results anytime on iOS and Android. Reports are visual, easy to explain, and built for visit-to-visit comparison.</p>
        <ul class="plus-list">
            <li>Clear reports designed for easy understanding</li>
            <li>Access from mobile, iPad, and desktop</li>
            <li>Compare progress over time</li>
            <li>Arabic and English language support</li>
        </ul>
        <div class="cta-row">
            <a class="link-arrow" href="{{ route('support') }}">Digital reporting &amp; support</a>
        </div>
    </div>
    <div class="app-split-photo" style="background-image:url('{{ asset('images/photos/app.jpg') }}')"></div>
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

<section class="news-block">
    <p class="kicker">Anovator News</p>
    <h2>News from the company</h2>
    <div class="news-grid">
        @foreach($news as $article)
            <a class="news-card" href="{{ route('news.show', $article['slug']) }}">
                <div class="news-photo" style="background-image:url('{{ asset('images/photos/'.$article['image']) }}')"></div>
                <p class="chip" style="margin-top:16px">{{ $article['date'] }}</p>
                <h3>{{ $article['title'] }}</h3>
            </a>
        @endforeach
    </div>
</section>

<section class="awards-block">
    <p class="kicker">Product range</p>
    <h2>Anovator assessment systems</h2>
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
</section>

<section class="certs-block">
    <p class="kicker">Certified &amp; safe technology</p>
    <h2 class="section-title">International certifications</h2>
    <div class="certs-row">
        <span class="cert-pill">Medical Device CTI Class II</span>
        <span class="cert-pill">ISO 13485</span>
        <span class="cert-pill">FDA</span>
        <span class="cert-pill">CE</span>
        <span class="cert-pill">RoHS</span>
        <span class="cert-pill">3-year device warranty</span>
        <span class="cert-pill">Lifetime software warranty</span>
    </div>
</section>

<section class="cta-banner" style="background-image:url('{{ asset('images/photos/cta.jpg') }}')">
    <div>
        <p class="kicker">Anovator GCC</p>
        <h2>Find the right assessment system for your facility</h2>
        <p>Qatar · UAE · Saudi Arabia · Bahrain · Kuwait · Oman</p>
        <div class="cta-row">
            <a class="btn-solid" href="{{ route('contact') }}">Request a demo</a>
            <a class="hero-cta" href="{{ route('finder') }}">Open product finder</a>
        </div>
    </div>
</section>
@endsection
