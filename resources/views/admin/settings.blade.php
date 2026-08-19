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
.brand-preview { max-width: 180px; max-height: 90px; object-fit: contain; border: 1px solid var(--line); border-radius: 10px; padding: 8px; background: #fff; }
.preview-box { display: grid; gap: 8px; color: var(--muted); font-size: 13px; font-weight: 700; }
.preview-box img { display: none; }
.preview-box.has-preview img { display: block; }
@media (max-width: 760px) { .settings-grid { grid-template-columns: 1fr; } }
</style>
@if (session('success'))<div class="settings-alert">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
@csrf
<section class="settings-grid">
    <article class="admin-panel"><h2>Site information</h2><label>Site name<input name="site_name" type="text" value="{{ old('site_name', $settings['site_name'] ?? 'BIZA') }}" required></label><label>Contact email<input name="contact_email" type="email" value="{{ old('contact_email', $settings['contact_email'] ?? 'info@biza.om') }}" required></label><label>Site description<textarea name="description" rows="4">{{ old('description', $settings['description'] ?? 'Business and digital services by BIZA.') }}</textarea></label></article>
    <article class="admin-panel"><h2>Preferences</h2><label>Default language<select name="default_language"><option value="ar">Arabic</option><option value="en">English</option></select></label><label>Timezone<select name="timezone"><option value="Asia/Muscat">Asia/Muscat</option><option value="Asia/Dubai">Asia/Dubai</option></select></label><label class="settings-toggle"><span>Email notifications</span><input name="email_notifications" type="checkbox" value="1" checked></label><label class="settings-toggle"><span>Maintenance mode</span><input name="maintenance_mode" type="checkbox" value="1"></label></article>
</section>
<section class="settings-grid" style="margin-top:20px"><article class="admin-panel"><h2>Branding</h2><label>Site logo<input id="site_logo" name="site_logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg"></label><div class="preview-box" id="logo-preview-box"><span>Logo preview</span><img id="logo-preview" class="brand-preview" src="" alt="Logo preview"></div><label>Site favicon<input id="site_favicon" name="site_favicon" type="file" accept=".png,.ico,.svg"></label><div class="preview-box" id="favicon-preview-box"><span>Favicon preview</span><img id="favicon-preview" class="brand-preview" src="" alt="Favicon preview"></div><button class="settings-save" type="submit">Save changes</button></article><article class="admin-panel"><h2>Current assets</h2>@if (!empty($settings['site_logo']))<img class="brand-preview" src="{{ asset('storage/'.$settings['site_logo']) }}" alt="Current site logo">@endif @if (!empty($settings['site_favicon']))<img class="brand-preview" src="{{ asset('storage/'.$settings['site_favicon']) }}" alt="Current favicon">@endif</article></section>
</form>
<script>
function previewFile(inputId, imageId, boxId) {
    const input = document.getElementById(inputId);
    const image = document.getElementById(imageId);
    const box = document.getElementById(boxId);
    input.addEventListener('change', () => {
        const file = input.files[0];
        if (!file) return;
        image.src = URL.createObjectURL(file);
        box.classList.add('has-preview');
    });
}
previewFile('site_logo', 'logo-preview', 'logo-preview-box');
previewFile('site_favicon', 'favicon-preview', 'favicon-preview-box');
</script>
@endsection
