<header class="site-header" data-site-header>
    <a href="{{ route('home') }}" class="site-header__brand" aria-label="Farahidi home">
        <img src="{{ asset('biza-logo.webp') }}" alt="Farahidi" width="160" height="160">
    </a>

    <nav class="site-header__navigation" aria-label="Primary navigation">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('legacy.page', 'about') }}">About</a>
        <a href="{{ route('legacy.page', 'team') }}">Team</a>
        <a href="{{ route('legacy.page', 'contact') }}">Contact</a>
    </nav>
</header>
