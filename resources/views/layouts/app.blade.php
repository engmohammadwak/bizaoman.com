<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $siteSettings['site_name'] ?? 'BIZA')</title>
    <link rel="icon" href="{{ !empty($siteSettings['site_favicon']) ? route('admin.settings.asset', ['path' => $siteSettings['site_favicon']]) : asset('favicon.ico') }}">
    <style>:root { --brand: {{ $siteSettings['primary_color'] ?? '#4f8e89' }}; --brand-dark: {{ $siteSettings['secondary_color'] ?? '#376f6b' }}; }</style>
    @stack('head')
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>
