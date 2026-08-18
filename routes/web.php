<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegacyPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about-blade', [AboutController::class, 'preview'])->name('about.blade');
Route::get('/{page}', LegacyPageController::class)->name('legacy.page');
