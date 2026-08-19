<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    private function defaults(): array
    {
        return [
            'site_name' => 'BIZA',
            'contact_email' => 'info@biza.om',
            'description' => 'Business and digital services by BIZA.',
            'default_language' => 'ar',
            'timezone' => 'Asia/Muscat',
            'email_notifications' => true,
            'maintenance_mode' => false,
        ];
    }

    public function __invoke(): View
    {
        $disk = Storage::disk('local');
        $saved = $disk->exists('admin-settings.json') ? json_decode($disk->get('admin-settings.json'), true) : [];
        $settings = array_merge($this->defaults(), is_array($saved) ? $saved : []);
        return view('admin.settings', compact('settings'));
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
        Storage::disk('local')->put('admin-settings.json', json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return back()->with('success', 'Settings saved successfully.');
    }
}
