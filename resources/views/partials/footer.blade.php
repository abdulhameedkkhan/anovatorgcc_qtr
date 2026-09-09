<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-brand">
            <div class="brand-mark">anovator</div>
            <p>Professional body composition analysis for healthcare, wellness, and performance across the Gulf.</p>
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
                <li><a href="{{ route('finder') }}">Product finder</a></li>
            </ul>
        </div>

        <div>
            <h4>Company</h4>
            <ul>
                <li><a href="{{ route('company') }}">Overview</a></li>
                <li><a href="{{ route('industries') }}">Industries</a></li>
                <li><a href="{{ route('news.index') }}">News</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
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
