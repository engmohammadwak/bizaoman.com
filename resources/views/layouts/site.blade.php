<!DOCTYPE html>
<html lang="{{ $siteSettings['default_language'] ?? 'ar' }}" dir="{{ ($siteSettings['default_language'] ?? 'ar') === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $siteSettings['site_name'] ?? 'BIZA')</title>
    @if (!empty($siteSettings['site_favicon']))<link rel="icon" href="{{ route('admin.settings.asset', ['path' => $siteSettings['site_favicon']]) }}">@endif
    <meta name="description" content="{{ $siteSettings['description'] ?? '' }}">
    <link rel="stylesheet" href="{{ route('theme.css') }}">
    @stack('head')
</head>
<body>
    <x-site-header />
    @yield('content')
    <x-site-footer />
    @stack('scripts')
</body>
</html>
