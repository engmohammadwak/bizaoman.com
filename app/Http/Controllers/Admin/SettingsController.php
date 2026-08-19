<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('admin.settings', [
            'settings' => session('admin_settings', [
                'site_name' => 'BIZA',
                'contact_email' => 'info@biza.om',
                'description' => 'Business and digital services by BIZA.',
                'default_language' => 'ar',
                'timezone' => 'Asia/Muscat',
                'email_notifications' => true,
                'maintenance_mode' => false,
            ]),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = $request->validate([
            'site_name' => ['required', 'string', 'max:120'],
            'contact_email' => ['required', 'email', 'max:190'],
            'description' => ['nullable', 'string', 'max:1000'],
            'default_language' => ['required', 'in:ar,en'],
            'timezone' => ['required', 'string', 'max:80'],
        ]);

        $settings['email_notifications'] = $request->boolean('email_notifications');
        $settings['maintenance_mode'] = $request->boolean('maintenance_mode');
        session(['admin_settings' => $settings]);

        return back()->with('success', 'Settings saved successfully.');
    }
}
