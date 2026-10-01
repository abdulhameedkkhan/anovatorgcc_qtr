<header class="site-header" id="site-header">
    <div class="util-bar">
        <div class="util-inner">
            <button class="util-link" type="button" data-open="lang">Languages · EN</button>
            <form class="util-search" action="{{ route('search') }}" method="get" role="search">
                <label class="visually-hidden" for="util-q">Search</label>
                <input id="util-q" type="search" name="q" placeholder="Search" value="{{ request('q') }}" required>
                <button type="submit" aria-label="Submit search">
                    <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M15.5 15.5 L20 20" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                </button>
            </form>
            <button class="util-link util-link-end" type="button" data-open="country">GCC countries</button>
        </div>
    </div>

    <div class="header-inner">
        <nav class="main-nav" id="main-nav" aria-label="Primary">
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Home</a>
            </div>
            <div class="nav-item has-menu">
                <a class="nav-label {{ request()->routeIs('products.*') || request()->routeIs('finder') ? 'is-active' : '' }}" href="{{ route('products.index') }}">Products</a>
                <div class="mega mega-cards">
                    <a class="mega-card" href="{{ route('products.index') }}">
                        <span class="mega-card-img" style="background-image:url('{{ asset('images/photos/mega-products.jpg') }}?v=7')"></span>
                        <span class="mega-card-title">All products</span>
                    </a>
                    @foreach($navProducts as $product)
                        <a class="mega-card" href="{{ route('products.show', $product['slug']) }}">
                            <span class="mega-card-img mega-card-img-product" style="background-image:url('{{ asset('images/products/'.$product['slug'].'/1.png') }}?v=7')"></span>
                            <span class="mega-card-title">{{ $product['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('solutions') || request()->routeIs('industries') ? 'is-active' : '' }}" href="{{ route('solutions') }}">Sectors We Serve</a>
            </div>
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('about') || request()->routeIs('company') ? 'is-active' : '' }}" href="{{ route('about') }}">About Us</a>
            </div>
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('business') ? 'is-active' : '' }}" href="{{ route('business') }}">Tailored Business Solutions</a>
            </div>
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('faq') ? 'is-active' : '' }}" href="{{ route('faq') }}">FAQ</a>
            </div>
            <div class="nav-item">
                <a class="nav-label {{ request()->routeIs('blog.*') || request()->routeIs('news.*') ? 'is-active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
            </div>
            <div class="nav-item">
                <a class="nav-label nav-label-pill {{ request()->routeIs('contact*') ? 'is-active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
            </div>
        </nav>

        <div class="header-tools">
            <button class="icon-btn" type="button" data-open="search" aria-label="Search">
                <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M15.5 15.5 L20 20" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
            </button>
            <button class="icon-btn" type="button" data-open="lang" aria-label="Languages">
                <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="1.4"/><path d="M4 12h16M12 4c2.8 2.4 4.2 5.2 4.2 8S14.8 17.6 12 20C9.2 17.6 7.8 14.8 7.8 12S9.2 6.4 12 4z" fill="none" stroke="currentColor" stroke-width="1.2"/></svg>
            </button>
            <button class="icon-btn menu-toggle" type="button" data-open="menu" aria-label="Open menu" aria-expanded="false" aria-controls="main-nav">
                <span></span><span></span><span></span>
            </button>
        </div>

        <a class="brand" href="{{ route('home') }}" aria-label="Anovator GCC home">
            <img class="brand-logo" src="{{ asset('images/logo.svg') }}?v=7" alt="Anovator" width="180" height="28">
            <span class="brand-claim">Advanced Body Analysis &amp; Health Assessment</span>
        </a>
    </div>
</header>
