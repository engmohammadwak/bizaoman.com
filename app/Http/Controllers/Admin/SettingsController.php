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
    private function defaults(): array
    {
        return ['site_name'=>'BIZA','contact_email'=>'info@biza.om','description'=>'Business and digital services by BIZA.','default_language'=>'ar','timezone'=>'Asia/Muscat','email_notifications'=>true,'maintenance_mode'=>false,'site_logo'=>null,'site_favicon'=>null];
    }

    private function read(): array
    {
        $disk = Storage::disk('local');
        $saved = $disk->exists('admin-settings.json') ? json_decode($disk->get('admin-settings.json'), true) : [];
        return array_merge($this->defaults(), is_array($saved) ? $saved : []);
    }

    public function __invoke(): View
    {
        return view('admin.settings', ['settings' => $this->read()]);
    }

    public function asset(string $path): Response
    {
        abort_unless(str_starts_with($path, 'branding/'), 404);
        abort_unless(Storage::disk('public')->exists($path), 404);
        return response(Storage::disk('public')->get($path), 200, ['Content-Type'=>Storage::disk('public')->mimeType($path),'Cache-Control'=>'no-store']);
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = $request->validate(['site_name'=>['required','string','max:120'],'contact_email'=>['required','email','max:190'],'description'=>['nullable','string','max:1000'],'default_language'=>['required','in:ar,en'],'timezone'=>['required','string','max:80']]);
        $current = $this->read();
        $settings['email_notifications'] = $request->boolean('email_notifications');
        $settings['maintenance_mode'] = $request->boolean('maintenance_mode');
        $settings['site_logo'] = $current['site_logo'];
        $settings['site_favicon'] = $current['site_favicon'];
        if ($request->hasFile('site_logo')) $settings['site_logo'] = $request->file('site_logo')->store('branding','public');
        if ($request->hasFile('site_favicon')) $settings['site_favicon'] = $request->file('site_favicon')->store('branding','public');
        Storage::disk('local')->put('admin-settings.json', json_encode($settings, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        return back()->with('success','Settings saved successfully.');
    }
}
