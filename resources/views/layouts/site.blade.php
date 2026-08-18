<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Farahidi')</title>
    @stack('head')
</head>
<body>
    <x-site-header />
    @yield('content')
    <x-site-footer />
    @stack('scripts')
</body>
</html>
