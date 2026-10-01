<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-brand">
            <img class="brand-logo brand-logo-footer" src="{{ asset('images/logo.svg') }}?v=7" alt="Anovator" width="160" height="25">
            <p>Advanced assessment systems using 8-electrode BIA for body composition analysis, posture assessment, and digital reporting across the GCC.</p>
            <p class="footer-contact">
                <a href="mailto:contact@anovatorgcc.com">contact@anovatorgcc.com</a><br>
                <a href="tel:+97450664777">+974 5066 4777</a><br>
                <a href="tel:+97472020005">+974 7202 0005</a>
            </p>
        </div>

        <div>
            <h4>Products</h4>
            <ul>
                <li><a href="{{ route('products.index') }}">All products</a></li>
                <li><a href="{{ route('products.show', 'a5') }}">Anovator A5</a></li>
                <li><a href="{{ route('products.show', 'm3') }}">Anovator M3</a></li>
                <li><a href="{{ route('products.show', 'm1') }}">Anovator M1</a></li>
                <li><a href="{{ route('products.show', 'm0') }}">Anovator M0</a></li>
            </ul>
        </div>

        <div>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('solutions') }}">Sectors We Serve</a></li>
                <li><a href="{{ route('business') }}">Business Solutions</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>

        <div>
            <h4>Anovator GCC</h4>
            <ul>
                @foreach($gccCountries as $country)
                    <li>{{ $country }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>All rights reserved Anovator GCC {{ date('Y') }}</p>
        <nav>
            <a href="{{ route('imprint') }}">Imprint</a>
            <a href="{{ route('privacy') }}">Data protection</a>
            <a href="{{ route('terms') }}">Terms</a>
        </nav>
    </div>
</footer>
