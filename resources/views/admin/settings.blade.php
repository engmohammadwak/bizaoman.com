@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<header class="admin-topbar"><div class="admin-heading"><p class="admin-eyebrow">BIZA website management</p><h1>Settings</h1></div><div class="admin-date">{{ now()->format('d M Y') }}</div></header>
<style>
.settings-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
.settings-grid .admin-panel { display: grid; gap: 18px; }
.settings-grid label { display: grid; gap: 8px; color: var(--muted); font-size: 14px; font-weight: 700; }
.settings-grid input { width: 100%; border: 1px solid var(--line); border-radius: 10px; padding: 12px; color: var(--ink); background: #fff; font: inherit; }
.settings-save { width: fit-content; border: 0; border-radius: 10px; padding: 12px 18px; color: #fff; background: var(--brand-dark); cursor: pointer; font-weight: 700; }
.settings-alert { padding: 12px 14px; border-radius: 10px; color: #27655f; background: #e6f2f0; font-weight: 700; }
.brand-preview { max-width: 180px; max-height: 90px; object-fit: contain; border: 1px solid var(--line); border-radius: 10px; padding: 8px; background: #fff; }
@media (max-width: 760px) { .settings-grid { grid-template-columns: 1fr; } }
</style>
@if (session('success'))<div class="settings-alert">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"><div class="settings-grid">
    @csrf
    <article class="admin-panel"><h2>Branding</h2><label>Site logo<input name="site_logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg"></label><label>Site favicon<input name="site_favicon" type="file" accept=".png,.ico,.svg"></label><button class="settings-save" type="submit">Save branding</button></article>
    <article class="admin-panel"><h2>Current assets</h2>@if (!empty($settings['site_logo']))<img class="brand-preview" src="{{ asset('storage/'.$settings['site_logo']) }}" alt="Current site logo">@endif @if (!empty($settings['site_favicon']))<img class="brand-preview" src="{{ asset('storage/'.$settings['site_favicon']) }}" alt="Current favicon">@endif</article>
</div></form>
@endsection
