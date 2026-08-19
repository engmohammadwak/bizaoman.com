@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<header class="admin-topbar"><div class="admin-heading"><p class="admin-eyebrow">BIZA website management</p><h1>Settings</h1></div><div class="admin-date">{{ now()->format('d M Y') }}</div></header>
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
@csrf
<section class="settings-grid" style="margin-top:20px"><article class="admin-panel"><h2>Branding</h2><label>Site logo<input id="site_logo" name="site_logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg"></label><div class="preview-box" id="logo-preview-box"><span>Logo preview</span><img id="logo-preview" class="brand-preview" src="" alt="Logo preview"></div><label>Site favicon<input id="site_favicon" name="site_favicon" type="file" accept=".png,.ico,.svg"></label><div class="preview-box" id="favicon-preview-box"><span>Favicon preview</span><img id="favicon-preview" class="brand-preview" src="" alt="Favicon preview"></div><button class="settings-save" type="submit">Save changes</button></article><article class="admin-panel"><h2>Current assets</h2>@if (!empty($settings['site_logo']))<img class="brand-preview" src="{{ route('admin.settings.asset', ['path' => $settings['site_logo']]) }}" alt="Current site logo">@endif @if (!empty($settings['site_favicon']))<img class="brand-preview" src="{{ route('admin.settings.asset', ['path' => $settings['site_favicon']]) }}" alt="Current favicon">@endif</article></section>
</form>
<script>
function previewFile(inputId, imageId, boxId) { const input = document.getElementById(inputId), image = document.getElementById(imageId), box = document.getElementById(boxId); input.addEventListener('change', () => { const file = input.files[0]; if (!file) return; image.src = URL.createObjectURL(file); box.classList.add('has-preview'); }); }
previewFile('site_logo', 'logo-preview', 'logo-preview-box');
previewFile('site_favicon', 'favicon-preview', 'favicon-preview-box');
</script>
@endsection
