<div class="overlay" id="country-overlay" hidden>
    <div class="overlay-panel country-panel">
        <button class="overlay-close" type="button" data-close="country" aria-label="Close country selector">+</button>
        <h2>Please choose</h2>
        <p>Language and country.</p>
        <ul class="country-list">
            @foreach($gccCountries as $country)
                <li><a href="{{ route('contact') }}">{{ $country }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
