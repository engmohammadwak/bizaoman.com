<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') · BIZA</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    @stack('head')
</head>
<body>
    @yield('content')
</body>
</html>
