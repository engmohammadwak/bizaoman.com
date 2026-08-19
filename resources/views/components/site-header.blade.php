<header class="site-header">
    <a href="{{ url('/') }}" class="site-brand">
        @if (!empty($siteSettings['site_logo']))
            <img src="{{ route('admin.settings.asset', ['path' => $siteSettings['site_logo']]) }}" alt="{{ $siteSettings['site_name'] ?? 'BIZA' }}">
        @else
            <img src="{{ asset('biza-logo.png') }}" alt="{{ $siteSettings['site_name'] ?? 'BIZA' }}">
        @endif
        <span>{{ $siteSettings['site_name'] ?? 'BIZA' }}</span>
    </a>
</header>
