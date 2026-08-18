@extends('layouts.app')

@section('title', 'Farahidi')

@section('content')
<main class="farahidi-home">
    <header class="site-header">
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('assets/biza-logo.webp') }}" alt="Farahidi logo" width="160">
        </a>
        <nav class="site-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <section class="hero" id="about">
        <div class="hero-content">
            <p class="eyebrow">Business development and consulting</p>
            <h1>Welcome to Farahidi</h1>
            <p>Professional solutions for businesses, entrepreneurs, and organizations.</p>
            <a class="button" href="#services">Explore our services</a>
        </div>
        <img src="{{ asset('assets/biza-coin.webp') }}" alt="Farahidi coin" class="hero-image">
    </section>

    <section class="services" id="services">
        <article><h2>Business Development</h2><p>Support for sustainable business growth.</p></article>
        <article><h2>Financial Consulting</h2><p>Practical financial guidance for better decisions.</p></article>
        <article><h2>Entrepreneurship</h2><p>Helping entrepreneurs turn ideas into opportunities.</p></article>
    </section>

    <section class="contact" id="contact">
        <h2>Let’s work together</h2>
        <a class="button" href="{{ route('home') }}#contact">Contact Farahidi</a>
    </section>
</main>
@endsection

@push('styles')
<style>
:root { font-family: Inter, Arial, sans-serif; color: #17221d; background: #f7f8f5; }
* { box-sizing: border-box; }
body { margin: 0; }
.farahidi-home { min-height: 100vh; }
.site-header { display: flex; justify-content: space-between; align-items: center; gap: 2rem; padding: 1.25rem 6vw; background: #fff; }
.brand img { display: block; object-fit: contain; }
.site-nav { display: flex; gap: 1.25rem; flex-wrap: wrap; }
.site-nav a { color: #17221d; text-decoration: none; font-weight: 600; }
.hero { display: grid; grid-template-columns: 1.2fr .8fr; align-items: center; gap: 3rem; padding: 7rem 10vw; background: linear-gradient(135deg, #eef4e8, #fff); }
.hero-content { max-width: 680px; }
.eyebrow { color: #657b43; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
h1 { margin: .5rem 0 1rem; font-size: clamp(2.5rem, 7vw, 5.5rem); line-height: .98; }
h2 { font-size: clamp(1.5rem, 3vw, 2.25rem); }
.hero p:not(.eyebrow) { color: #53605a; font-size: 1.15rem; line-height: 1.7; }
.button { display: inline-block; margin-top: 1rem; padding: .85rem 1.2rem; border-radius: 999px; background: #657b43; color: #fff; text-decoration: none; font-weight: 700; }
.hero-image { width: min(100%, 360px); margin: auto; filter: drop-shadow(0 25px 35px rgba(42, 60, 30, .18)); }
.services { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; padding: 5rem 10vw; background: #fff; }
.services article { padding: 2rem; border: 1px solid #e3e9df; border-radius: 1.25rem; background: #fbfcfa; }
.services p { color: #53605a; line-height: 1.6; }
.contact { padding: 5rem 10vw; text-align: center; background: #17221d; color: #fff; }
@media (max-width: 760px) { .site-header, .hero { grid-template-columns: 1fr; flex-direction: column; align-items: flex-start; } .hero { padding: 4rem 6vw; } .services { grid-template-columns: 1fr; padding: 3rem 6vw; } }
</style>
@endpush
