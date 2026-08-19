<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegacyPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/admin', DashboardController::class)->name('admin.dashboard');
Route::get('/admin/settings', SettingsController::class)->name('admin.settings');
Route::get('/admin/settings/asset/{path}', [SettingsController::class, 'asset'])->where('path', '.*')->name('admin.settings.asset');
Route::post('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
Route::get('/about', [AboutController::class, 'preview'])->name('about');
Route::get('/about-blade', [AboutController::class, 'preview'])->name('about.blade');
Route::get('/about-legacy', function () { return response()->file(public_path('legacy/about/index.html')); })->name('about.legacy');
Route::get('/{page}', LegacyPageController::class)->name('legacy.page');
