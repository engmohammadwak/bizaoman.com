<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->file(public_path('legacy/index.html'));
})->name('home');

Route::get('/{page}', function (string $page) {
    abort_unless(in_array($page, [
        'about',
        'business-development',
        'certificates',
        'clients-private',
        'clients-public',
        'contact',
        'entrepreneurship',
        'financial-consulting',
        'team',
    ], true), 404);

    return response()->file(public_path("legacy/{$page}/index.html"));
});
