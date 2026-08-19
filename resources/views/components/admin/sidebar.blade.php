<aside class="admin-sidebar">
    <a class="admin-brand" href="{{ url('/admin') }}">
        @if (!empty($siteSettings['site_logo']))
            <img src="{{ route('admin.settings.asset', ['path' => $siteSettings['site_logo']]) }}" alt="{{ $siteSettings['site_name'] ?? 'BIZA' }}">
        @else
            <img src="{{ asset('biza-logo.png') }}" alt="{{ $siteSettings['site_name'] ?? 'BIZA' }}">
        @endif
        <span>{{ $siteSettings['site_name'] ?? 'BIZA' }} Admin</span>
    </a>
    <nav class="admin-nav" aria-label="Admin navigation">
        <a class="active" href="{{ url('/admin') }}">Dashboard</a>
        <a href="{{ url('/about') }}">View website</a>
        <a href="#">Pages</a>
        <a href="#">Services</a>
        <a href="#">Team</a>
        <a href="#">Messages</a>
        <a href="{{ route('admin.settings') }}">Settings</a>
    </nav>
</aside>
