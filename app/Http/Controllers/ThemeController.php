<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{
    public function __invoke(): Response
    {
        $defaults = ['primary_color' => '#4f8e89', 'secondary_color' => '#376f6b'];
        $disk = Storage::disk('local');
        $saved = $disk->exists('admin-settings.json') ? json_decode($disk->get('admin-settings.json'), true) : [];
        $settings = array_merge($defaults, is_array($saved) ? $saved : []);

        $css = <<<CSS
:root {
    --brand: {$settings['primary_color']};
    --brand-dark: {$settings['secondary_color']};
    --ink: #17221d;
    --muted: #718080;
    --surface: #f4f8f7;
    --line: #dce9e7;
}
* { box-sizing: border-box; }
body { margin: 0; font-family: Arial, Inter, sans-serif; color: var(--ink); }
a { color: inherit; text-decoration: none; }

.site-header { display: flex; justify-content: space-between; align-items: center; gap: 2rem; padding: 1.25rem 6vw; background: #fff; }
.site-brand, .site-header__brand { display:flex; align-items:center; gap:12px; font-weight:700; font-size:1.4rem; }
.site-brand img, .site-header__brand img { display:block; object-fit:contain; width:56px; height:56px; }
.site-header__navigation { display: flex; gap: 1.25rem; flex-wrap: wrap; }
.site-header__navigation a { color: var(--ink); font-weight: 600; }

.site-shell { min-height: 100vh; }
.homepage__hero { display: grid; grid-template-columns: 1.2fr .8fr; align-items: center; gap: 3rem; padding: 7rem 10vw; background: linear-gradient(135deg, #eef4e8, #fff); }
.homepage__hero-content { max-width: 680px; }
.homepage__eyebrow { color: var(--brand); font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
.homepage__hero h1 { margin: .5rem 0 1rem; font-size: clamp(2.5rem, 7vw, 5.5rem); line-height: .98; color: var(--ink); }
.homepage__intro { color: #53605a; font-size: 1.15rem; line-height: 1.7; }
.homepage__button { display: inline-block; margin-top: 1rem; padding: .85rem 1.2rem; border-radius: 999px; background: var(--brand-dark); color: #fff; font-weight: 700; }
.homepage__hero-image { width: min(100%, 360px); height: auto; margin: auto; filter: drop-shadow(0 25px 35px rgba(42, 60, 30, .18)); }
.homepage__services { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; padding: 5rem 10vw; background: #fff; }
.homepage__service-card { padding: 2rem; border: 1px solid #e3e9df; border-radius: 1.25rem; background: #fbfcfa; }
.homepage__service-card h3 { color: var(--ink); }
.homepage__service-card p { color: #53605a; line-height: 1.6; }
.homepage__contact { padding: 5rem 10vw; text-align: center; background: var(--brand-dark); color: #fff; }
.homepage__contact h2 { margin: 0 0 .75rem; }
.sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }

.site-footer { padding: 1.5rem 6vw; text-align: center; background: var(--brand-dark); color: #fff; }

.page-hero { padding: 8rem 8vw 4rem; text-align: center; background: linear-gradient(135deg, var(--brand-dark), var(--brand)); color: #fff; }
.page-hero__eyebrow { display:inline-block; padding:.4rem 1rem; background:rgba(255,255,255,.15); border-radius:999px; font-size:.85rem; font-weight:700; margin-bottom:1rem; }
.page-hero h1 { font-size: clamp(2rem, 5vw, 3.2rem); margin: .5rem 0 1rem; }
.page-hero p { max-width: 640px; margin: 0 auto; opacity: .9; font-size: 1.1rem; }
.page-intro { max-width: 760px; margin: 0 auto; padding: 3rem 6vw; text-align: center; font-size: 1.15rem; color: #4b5a55; line-height: 1.8; }
.page-section { padding: 2rem 6vw 4rem; max-width: 1100px; margin: 0 auto; }
.page-section__title { text-align: center; font-size: clamp(1.5rem, 3vw, 2.1rem); margin-bottom: 2.2rem; color: var(--ink); }
.journey-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; }
.journey-card { background: #fff; border: 1px solid #e6ece9; border-radius: 1.25rem; padding: 1.75rem; text-align: center; }
.journey-card__num { display: block; font-size: 2.2rem; font-weight: 900; color: rgba(61,154,126,.15); margin-bottom: .5rem; }
.journey-card h3 { margin: 0 0 .5rem; color: var(--ink); }
.journey-card p { color: #63716c; font-size: .95rem; }
.homepage__services--wide { grid-template-columns: repeat(2, 1fr); }
.stats-band { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; padding: 3rem 6vw; background: var(--brand-dark); color: #fff; text-align: center; }
.stats-band__value { display: block; font-size: 2.2rem; font-weight: 800; }
.stats-band__label { font-size: .9rem; opacity: .8; }

.admin-shell { display: flex; min-height: 100vh; }
.admin-sidebar { width: 250px; flex: 0 0 250px; padding: 28px 20px; color: #fff; background: var(--brand-dark); }
.admin-brand { display: flex; align-items: center; gap: 12px; margin-bottom: 42px; font-size: 22px; font-weight: 700; }
.admin-brand img { width: 46px; height: 46px; object-fit: contain; border-radius: 10px; background: #fff; }
.admin-nav { display: grid; gap: 8px; }
.admin-nav a { padding: 12px 14px; border-radius: 10px; color: rgba(255,255,255,.82); }
.admin-nav a:hover, .admin-nav a.active { color: #fff; background: rgba(255,255,255,.14); }
.admin-main { flex: 1; min-width: 0; padding: 34px clamp(22px, 4vw, 58px); background: var(--surface); }
.admin-topbar { display: flex; align-items: flex-start; justify-content: space-between; gap: 24px; margin-bottom: 34px; }
.admin-heading { min-width: 0; }
.admin-eyebrow { margin: 0 0 6px; color: var(--brand); font-size: 13px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
.admin-main h1 { margin: 0; font-size: clamp(28px, 4vw, 42px); line-height: 1.15; color: var(--ink); }
.admin-tools { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }
.admin-date { color: var(--muted); font-size: 14px; white-space: nowrap; }
.admin-stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; margin-bottom: 26px; }
.stat-card, .admin-panel { border: 1px solid var(--line); border-radius: 16px; background: #fff; box-shadow: 0 8px 24px rgba(55,111,107,.06); }
.stat-card { padding: 22px; }
.stat-label { color: var(--muted); font-size: 14px; }
.stat-value { margin: 12px 0 8px; font-size: 32px; font-weight: 700; color: var(--ink); }
.stat-change { color: var(--brand); font-size: 13px; font-weight: 700; }
.admin-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 20px; }
.admin-panel { padding: 24px; }
.admin-panel h2 { margin: 0 0 20px; font-size: 19px; color: var(--ink); }
.activity { display: grid; gap: 16px; }
.activity-item { display: flex; justify-content: space-between; gap: 15px; padding-bottom: 16px; border-bottom: 1px solid var(--line); }
.activity-item:last-child { padding-bottom: 0; border-bottom: 0; }
.activity-title { margin: 0 0 5px; font-weight: 700; color: var(--ink); }
.activity-meta { margin: 0; color: var(--muted); font-size: 13px; }
.badge { height: fit-content; padding: 6px 9px; border-radius: 999px; color: var(--brand-dark); background: #e6f2f0; font-size: 12px; font-weight: 700; }

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

@media (max-width: 900px) { .admin-stats { grid-template-columns: repeat(2, 1fr); } .admin-grid { grid-template-columns: 1fr; } }
@media (max-width: 760px) { .site-header, .homepage__hero { flex-direction: column; align-items: flex-start; } .homepage__hero { grid-template-columns: 1fr; padding: 4rem 6vw; } .homepage__services { grid-template-columns: 1fr; padding: 3rem 6vw; } .settings-grid { grid-template-columns: 1fr; } .journey-grid, .homepage__services--wide, .stats-band { grid-template-columns: 1fr 1fr; } }
@media (max-width: 640px) { .admin-shell { display: block; } .admin-sidebar { width: auto; flex-basis: auto; padding: 18px; } .admin-brand { margin-bottom: 18px; } .admin-nav { display: flex; flex-wrap: wrap; } .admin-nav a { padding: 9px 11px; font-size: 14px; } .admin-main { padding: 26px 18px; } .admin-topbar { display: block; } .admin-tools { margin-top: 18px; } .admin-stats { grid-template-columns: 1fr; } }
@media (max-width: 480px) { .journey-grid, .homepage__services--wide, .stats-band { grid-template-columns: 1fr; } }
CSS;

        return response($css, 200, ['Content-Type' => 'text/css', 'Cache-Control' => 'no-store']);
    }
}
