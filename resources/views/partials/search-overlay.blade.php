<div class="overlay" id="search-overlay" hidden>
    <div class="overlay-panel">
        <button class="overlay-close" type="button" data-close="search" aria-label="Close search">+</button>
        <h2>Search</h2>
        <form action="{{ route('search') }}" method="get" class="search-form" id="overlay-search-form">
            <label class="visually-hidden" for="overlay-q">Search</label>
            <input id="overlay-q" type="search" name="q" placeholder="Search products, news, industries" value="{{ request('q') }}" required>
            <button type="submit">Search</button>
        </form>
    </div>
</div>
