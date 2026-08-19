<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{
    public function __invoke(): Response
    {
        $defaults = ['primary_color' => '#2d8c7e', 'secondary_color' => '#236e63'];
        $disk = Storage::disk('local');
        $saved = $disk->exists('admin-settings.json') ? json_decode($disk->get('admin-settings.json'), true) : [];
        $settings = array_merge($defaults, is_array($saved) ? $saved : []);
        $primary = $settings['primary_color'];
        $secondary = $settings['secondary_color'];

        $css = ":root{--biza-green:{$primary};--biza-green-dark:{$secondary};--biza-green-light:#5ab5a8;--biza-yellow:#f5c518;--biza-yellow-dark:#d4a810;--brand:{$primary};--brand-dark:{$secondary};--ink:#17221d;--muted:#718080;--surface:#f4f8f7;--line:#dce9e7}\n";
        $css .= ".bg-biza-green{background-color:var(--biza-green)!important}.text-biza-green{color:var(--biza-green)!important}.border-biza-green{border-color:var(--biza-green)!important}.from-biza-green{--tw-gradient-from:var(--biza-green)!important;--tw-gradient-to:rgb(255 255 255 / 0)!important}.to-biza-green{--tw-gradient-to:var(--biza-green)!important}.from-biza-green-dark{--tw-gradient-from:var(--biza-green-dark)!important;--tw-gradient-to:rgb(255 255 255 / 0)!important}.to-biza-green-dark{--tw-gradient-to:var(--biza-green-dark)!important}.bg-biza-green\\/10{background-color:color-mix(in srgb,var(--biza-green) 10%,transparent)!important}.bg-biza-green\\/20{background-color:color-mix(in srgb,var(--biza-green) 20%,transparent)!important}.text-biza-green\\/20{color:color-mix(in srgb,var(--biza-green) 20%,transparent)!important}.hover\\:bg-biza-green:hover{background-color:var(--biza-green)!important}.hover\\:text-biza-green:hover{color:var(--biza-green)!important}.hero-gradient{background:linear-gradient(135deg,var(--biza-green-dark),var(--biza-green) 55%,var(--biza-green-dark))!important}.btn-primary{background:var(--biza-green)!important}.btn-primary:hover{background:var(--biza-green-dark)!important}\n";
        $css .= ".site-footer{background:var(--brand-dark);color:#fff}.site-header{position:relative;z-index:20}.admin-shell{display:flex;min-height:100vh}.admin-sidebar{width:250px;flex:0 0 250px;padding:28px 20px;color:#fff;background:var(--brand-dark)}.admin-brand{display:flex;align-items:center;gap:12px;margin-bottom:42px;font-size:22px;font-weight:700}.admin-brand img{width:46px;height:46px;object-fit:contain;border-radius:10px;background:#fff}.admin-nav{display:grid;gap:8px}.admin-nav a{padding:12px 14px;border-radius:10px;color:rgba(255,255,255,.82)}.admin-nav a:hover,.admin-nav a.active{color:#fff;background:rgba(255,255,255,.14)}.admin-main{flex:1;min-width:0;padding:34px clamp(22px,4vw,58px);background:var(--surface)}.admin-panel,.stat-card{border:1px solid var(--line);border-radius:16px;background:#fff;box-shadow:0 8px 24px rgba(55,111,107,.06)}.settings-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.settings-grid .admin-panel{display:grid;gap:18px}.settings-grid input,.settings-grid textarea,.settings-grid select{width:100%;border:1px solid var(--line);border-radius:10px;padding:12px;color:var(--ink);background:#fff;font:inherit}.settings-save{border:0;border-radius:10px;padding:12px 18px;color:#fff;background:var(--brand-dark);cursor:pointer;font-weight:700}@media(max-width:760px){.settings-grid{grid-template-columns:1fr}}@media(max-width:640px){.admin-shell{display:block}.admin-sidebar{width:auto}.admin-nav{display:flex;flex-wrap:wrap}}\n";

        return response($css, 200, ['Content-Type' => 'text/css', 'Cache-Control' => 'no-store']);
    }
}
