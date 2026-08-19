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
.settings-toggle { display: flex !important; align-items: center; justify-content: space-between; padding: 14px 0; border-bottom: 1px solid var(--line); }
.settings-toggle input { width: auto; accent-color: var(--brand-dark); }
@media (max-width: 760px) { .settings-grid { grid-template-columns: 1fr; } }
</style>
<section class="settings-grid">
    <article class="admin-panel"><h2>Site information</h2><label>Site name<input type="text" value="BIZA"></label><label>Contact email<input type="email" value="info@biza.om"></label><label>Site description<textarea rows="4">Business and digital services by BIZA.</textarea></label><button class="settings-save" type="button">Save changes</button></article>
    <article class="admin-panel"><h2>Preferences</h2><label>Default language<select><option>Arabic</option><option>English</option></select></label><label>Timezone<select><option>Asia/Muscat</option><option>Asia/Dubai</option></select></label><label class="settings-toggle"><span>Email notifications</span><input type="checkbox" checked></label><label class="settings-toggle"><span>Maintenance mode</span><input type="checkbox"></label></article>
</section>
@endsection
