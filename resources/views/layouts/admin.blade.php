<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') · {{ $siteSettings['site_name'] ?? 'BIZA' }}</title>
    <link rel="icon" href="{{ !empty($siteSettings['site_favicon']) ? route('admin.settings.asset', ['path' => $siteSettings['site_favicon']]) : asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ route('theme.css') }}">
    @stack('head')
</head>
<body>
    <div class="admin-shell">
        @include('components.admin.sidebar')
        <main class="admin-main">@yield('content')</main>
    </div>
    @stack('scripts')
</body>
</html>
