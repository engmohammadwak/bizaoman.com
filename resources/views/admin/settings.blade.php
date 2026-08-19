@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<header class="admin-topbar"><div class="admin-heading"><p class="admin-eyebrow">{{ $settings['site_name'] ?? 'BIZA' }} website management</p><h1>Settings</h1></div><div class="admin-date">{{ now()->format('d M Y') }}</div></header>
<style>
.settings-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:20px; }
.settings-grid .admin-panel { display:grid; gap:18px; }
.settings-grid label { display:grid; gap:8px; color:var(--muted); font-size:14px; font-weight:700; }
.settings-grid input,.settings-grid textarea,.settings-grid select { width:100%; border:1px solid var(--line); border-radius:10px; padding:12px; color:var(--ink); background:#fff; font:inherit; font-weight:400; }
.settings-grid textarea { resize:vertical; }
.settings-toggle { display:flex!important; align-items:center; justify-content:space-between; padding:14px 0; border-bottom:1px solid var(--line); }
.settings-toggle input { width:auto; accent-color:var(--brand-dark); }
.settings-save { width:fit-content; border:0; border-radius:10px; padding:12px 18px; color:#fff; background:var(--brand-dark); cursor:pointer; font-weight:700; }
.settings-alert { margin-bottom:18px; padding:12px 14px; border-radius:10px; color:#27655f; background:#e6f2f0; font-weight:700; }
.settings-errors { margin-bottom:18px; padding:12px 14px; border-radius:10px; color:#8b3030; background:#fbecec; }
.brand-preview { max-width:180px; max-height:90px; object-fit:contain; border:1px solid var(--line); border-radius:10px; padding:8px; background:#fff; }
.preview-box { display:grid; gap:8px; color:var(--muted); font-size:13px; font-weight:700; }
.preview-box img { display:none; }
.preview-box.has-preview img { display:block; }
.settings-section { margin-top:20px; }
.color-field { display:flex; align-items:center; gap:12px; }
.color-field input[type=color] { width:52px; height:44px; padding:2px; cursor:pointer; }
.color-field input[type=text] { flex:1; }
@media (max-width:760px) { .settings-grid { grid-template-columns:1fr; } }
</style>
@if(session('success'))<div class="settings-alert">{{ session('success') }}</div>@endif
@if($errors->any())<div class="settings-errors"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
@csrf
<section class="settings-grid">
<article class="admin-panel"><h2>Site information</h2><label>Site name<input name="site_name" value="{{ old('site_name',$settings['site_name']??'BIZA') }}" required></label><label>Contact email<input name="contact_email" type="email" value="{{ old('contact_email',$settings['contact_email']??'info@biza.om') }}" required></label><label>Site description<textarea name="description" rows="4">{{ old('description',$settings['description']??'Business and digital services by BIZA.') }}</textarea></label></article>
<article class="admin-panel"><h2>Preferences</h2><label>Default language<select name="default_language"><option value="ar" @selected(old('default_language',$settings['default_language']??'ar')==='ar')>Arabic</option><option value="en" @selected(old('default_language',$settings['default_language']??'ar')==='en')>English</option></select></label><label>Timezone<select name="timezone"><option value="Asia/Muscat" @selected(old('timezone',$settings['timezone']??'Asia/Muscat')==='Asia/Muscat')>Asia/Muscat</option><option value="Asia/Dubai" @selected(old('timezone',$settings['timezone']??'Asia/Muscat')==='Asia/Dubai')>Asia/Dubai</option></select></label><label class="settings-toggle"><span>Email notifications</span><input name="email_notifications" type="checkbox" value="1" @checked(old('email_notifications',$settings['email_notifications']??true))></label><label class="settings-toggle"><span>Maintenance mode</span><input name="maintenance_mode" type="checkbox" value="1" @checked(old('maintenance_mode',$settings['maintenance_mode']??false))></label></article>
</section>
<section class="settings-grid settings-section"><article class="admin-panel"><h2>Appearance</h2><label>Primary color<div class="color-field"><input id="primary_color_picker" type="color" value="{{ old('primary_color',$settings['primary_color']??'#4f8e89') }}"><input id="primary_color" name="primary_color" type="text" value="{{ old('primary_color',$settings['primary_color']??'#4f8e89') }}" pattern="^#[0-9a-fA-F]{6}$" required></div></label><label>Secondary color<div class="color-field"><input id="secondary_color_picker" type="color" value="{{ old('secondary_color',$settings['secondary_color']??'#376f6b') }}"><input id="secondary_color" name="secondary_color" type="text" value="{{ old('secondary_color',$settings['secondary_color']??'#376f6b') }}" pattern="^#[0-9a-fA-F]{6}$" required></div></label></article><article class="admin-panel"><h2>Color preview</h2><p style="color:var(--muted);font-size:13px">This preview updates instantly as you pick colors, and applies across the whole site and dashboard after saving.</p><button type="button" id="color-preview-swatch" style="width:100%;height:60px;border-radius:10px;border:1px solid var(--line)"></button></article></section>
<section class="settings-grid settings-section"><article class="admin-panel"><h2>Branding</h2><label>Site logo<input id="site_logo" name="site_logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg"></label><div class="preview-box" id="logo-preview-box"><span>Logo preview</span><img id="logo-preview" class="brand-preview" alt="Logo preview"></div><label>Site favicon<input id="site_favicon" name="site_favicon" type="file" accept=".png,.ico,.svg"></label><div class="preview-box" id="favicon-preview-box"><span>Favicon preview</span><img id="favicon-preview" class="brand-preview" alt="Favicon preview"></div><button class="settings-save" type="submit">Save changes</button></article><article class="admin-panel"><h2>Current assets</h2>@if(!empty($settings['site_logo']))<img class="brand-preview" src="{{ route('admin.settings.asset',['path'=>$settings['site_logo']]) }}" alt="Current site logo">@endif @if(!empty($settings['site_favicon']))<img class="brand-preview" src="{{ route('admin.settings.asset',['path'=>$settings['site_favicon']]) }}" alt="Current favicon">@endif</article></section>
</form>
<script>
function previewFile(inputId,imageId,boxId){const input=document.getElementById(inputId),image=document.getElementById(imageId),box=document.getElementById(boxId);input.addEventListener('change',()=>{const file=input.files[0];if(!file)return;image.src=URL.createObjectURL(file);box.classList.add('has-preview');});}
previewFile('site_logo','logo-preview','logo-preview-box');previewFile('site_favicon','favicon-preview','favicon-preview-box');
function syncColor(pickerId,textId){const picker=document.getElementById(pickerId),text=document.getElementById(textId);picker.addEventListener('input',()=>{text.value=picker.value;updateSwatch();});text.addEventListener('input',()=>{if(/^#[0-9a-fA-F]{6}$/.test(text.value))picker.value=text.value;updateSwatch();});}
function updateSwatch(){const p=document.getElementById('primary_color').value,s=document.getElementById('secondary_color').value,swatch=document.getElementById('color-preview-swatch');swatch.style.background=`linear-gradient(90deg, ${p}, ${s})`;}
syncColor('primary_color_picker','primary_color');syncColor('secondary_color_picker','secondary_color');updateSwatch();
</script>
@endsection
