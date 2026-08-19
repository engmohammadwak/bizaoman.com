<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.settings', ['settings' => session('admin_settings', [])]);
    }

    public function asset(string $path): Response
    {
        abort_unless(str_starts_with($path, 'branding/'), 404);
        abort_unless(Storage::disk('public')->exists($path), 404);
        return response(Storage::disk('public')->get($path), 200, ['Content-Type' => Storage::disk('public')->mimeType($path), 'Cache-Control' => 'no-store']);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate(['site_logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:2048'], 'site_favicon' => ['nullable', 'file', 'mimes:png,ico,svg', 'max:1024']]);
        $settings = session('admin_settings', []);
        if ($request->hasFile('site_logo')) $settings['site_logo'] = $request->file('site_logo')->store('branding', 'public');
        if ($request->hasFile('site_favicon')) $settings['site_favicon'] = $request->file('site_favicon')->store('branding', 'public');
        session(['admin_settings' => $settings]);
        return back()->with('success', 'Branding settings saved successfully.');
    }
}
