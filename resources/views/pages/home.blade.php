@extends('layouts.app')

@section('title', 'Farahidi')

@section('content')
<div class="site-shell">
    <x-site-header />

    <main class="homepage">
        <section class="homepage__hero" aria-labelledby="homepage-title">
            <div class="homepage__hero-content">
                <p class="homepage__eyebrow">Business development and consulting</p>
                <h1 id="homepage-title">Welcome to Farahidi</h1>
                <p class="homepage__intro">Professional solutions for businesses, entrepreneurs, and organizations.</p>
                <a class="homepage__button" href="#services">Explore our services</a>
            </div>

            <img class="homepage__hero-image" src="{{ asset('biza-coin.webp') }}" alt="Farahidi coin" width="360" height="360">
        </section>

        <section class="homepage__services" id="services" aria-labelledby="services-title">
            <h2 id="services-title" class="sr-only">Our services</h2>
            <article class="homepage__service-card">
                <h3>Business Development</h3>
                <p>Support for sustainable business growth.</p>
            </article>
            <article class="homepage__service-card">
                <h3>Financial Consulting</h3>
                <p>Practical financial guidance for better decisions.</p>
            </article>
            <article class="homepage__service-card">
                <h3>Entrepreneurship</h3>
                <p>Helping entrepreneurs turn ideas into opportunities.</p>
            </article>
        </section>

        <section class="homepage__contact" id="contact" aria-labelledby="contact-title">
            <h2 id="contact-title">Let’s work together</h2>
            <a class="homepage__button" href="{{ route('legacy.page', 'contact') }}">Contact Farahidi</a>
        </section>
    </main>

    <x-site-footer />
</div>
@endsection

@push('head')
<style>
:root { font-family: Inter, Arial, sans-serif; color: #17221d; background: #f7f8f5; }
* { box-sizing: border-box; }
body { margin: 0; }
.site-shell { min-height: 100vh; }
.site-header { display: flex; justify-content: space-between; align-items: center; gap: 2rem; padding: 1.25rem 6vw; background: #fff; }
.site-header__brand img { display: block; object-fit: contain; }
.site-header__navigation { display: flex; gap: 1.25rem; flex-wrap: wrap; }
.site-header__navigation a { color: #17221d; text-decoration: none; font-weight: 600; }
.homepage__hero { display: grid; grid-template-columns: 1.2fr .8fr; align-items: center; gap: 3rem; padding: 7rem 10vw; background: linear-gradient(135deg, #eef4e8, #fff); }
.homepage__hero-content { max-width: 680px; }
.homepage__eyebrow { color: #657b43; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
.homepage__hero h1 { margin: .5rem 0 1rem; font-size: clamp(2.5rem, 7vw, 5.5rem); line-height: .98; }
.homepage__hero h1, .homepage__services h3 { color: #17221d; }
.homepage__intro { color: #53605a; font-size: 1.15rem; line-height: 1.7; }
.homepage__button { display: inline-block; margin-top: 1rem; padding: .85rem 1.2rem; border-radius: 999px; background: #657b43; color: #fff; text-decoration: none; font-weight: 700; }
.homepage__hero-image { width: min(100%, 360px); height: auto; margin: auto; filter: drop-shadow(0 25px 35px rgba(42, 60, 30, .18)); }
.homepage__services { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; padding: 5rem 10vw; background: #fff; }
.homepage__service-card { padding: 2rem; border: 1px solid #e3e9df; border-radius: 1.25rem; background: #fbfcfa; }
.homepage__service-card p { color: #53605a; line-height: 1.6; }
.homepage__contact { padding: 5rem 10vw; text-align: center; background: #17221d; color: #fff; }
.site-footer { padding: 1.5rem 6vw; text-align: center; background: #17221d; color: #fff; }
.sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
@media (max-width: 760px) { .site-header { flex-direction: column; align-items: flex-start; } .homepage__hero { grid-template-columns: 1fr; padding: 4rem 6vw; } .homepage__services { grid-template-columns: 1fr; padding: 3rem 6vw; } }
</style>
@endpush
