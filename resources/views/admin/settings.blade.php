@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<header class="admin-topbar"><div class="admin-heading"><p class="admin-eyebrow">BIZA website management</p><h1>Settings</h1></div><div class="admin-date">{{ now()->format('d M Y') }}</div></header>
<style>
.settings-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
.settings-grid .admin-panel { display: grid; gap: 18px; }
.settings-grid label { display: grid; gap: 8px; color: var(--muted); font-size: 14px; font-weight: 700; }
.settings-grid input, .settings-grid textarea, .settings-grid select { width: 100%; border: 1px solid var(--line); border-radius: 10px; padding: 12px; color: var(--ink); background: #fff; font: inherit; font-weight: 400; }
.settings-grid textarea { resize: vertical; }
.settings-save { width: fit-content; border: 0; border-radius: 10px; padding: 12px 18px; color: #fff; background: var(--brand-dark); cursor: pointer; font-weight: 700; }
.settings-alert { margin-bottom: 18px; padding: 12px 14px; border-radius: 10px; color: #27655f; background: #e6f2f0; font-weight: 700; }
.settings-errors { margin-bottom: 18px; padding: 12px 14px; border-radius: 10px; color: #8b3030; background: #fbecec; }
.settings-toggle { display: flex !important; align-items: center; justify-content: space-between; padding: 14px 0; border-bottom: 1px solid var(--line); }
.settings-toggle input { width: auto; accent-color: var(--brand-dark); }
@media (max-width: 760px) { .settings-grid { grid-template-columns: 1fr; } }
</style>
@if (session('success'))<div class="settings-alert">{{ session('success') }}</div>@endif
@if ($errors->any())<div class="settings-errors"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('admin.settings.update') }}"><div class="settings-grid">
    @csrf
    <article class="admin-panel"><h2>Site information</h2><label>Site name<input name="site_name" type="text" value="{{ old('site_name', $settings['site_name']) }}" required></label><label>Contact email<input name="contact_email" type="email" value="{{ old('contact_email', $settings['contact_email']) }}" required></label><label>Site description<textarea name="description" rows="4">{{ old('description', $settings['description']) }}</textarea></label><button class="settings-save" type="submit">Save changes</button></article>
    <article class="admin-panel"><h2>Preferences</h2><label>Default language<select name="default_language"><option value="ar" @selected(old('default_language', $settings['default_language']) === 'ar')>Arabic</option><option value="en" @selected(old('default_language', $settings['default_language']) === 'en')>English</option></select></label><label>Timezone<select name="timezone"><option value="Asia/Muscat" @selected(old('timezone', $settings['timezone']) === 'Asia/Muscat')>Asia/Muscat</option><option value="Asia/Dubai" @selected(old('timezone', $settings['timezone']) === 'Asia/Dubai')>Asia/Dubai</option></select></label><label class="settings-toggle"><span>Email notifications</span><input name="email_notifications" type="checkbox" value="1" @checked(old('email_notifications', $settings['email_notifications']))></label><label class="settings-toggle"><span>Maintenance mode</span><input name="maintenance_mode" type="checkbox" value="1" @checked(old('maintenance_mode', $settings['maintenance_mode']))></label></article>
</div></form>
@endsection
