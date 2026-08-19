<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $defaults = ['site_name' => 'BIZA', 'contact_email' => 'info@biza.om', 'description' => 'Business and digital services by BIZA.', 'site_logo' => null, 'site_favicon' => null];
        $disk = Storage::disk('local');
        $saved = $disk->exists('admin-settings.json') ? json_decode($disk->get('admin-settings.json'), true) : [];
        view()->share('siteSettings', array_merge($defaults, is_array($saved) ? $saved : []));
    }
}
