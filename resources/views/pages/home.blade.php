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
            <h2 id="contact-title">Let's work together</h2>
            <a class="homepage__button" href="{{ route('legacy.page', 'contact') }}">Contact Farahidi</a>
        </section>
    </main>

    <x-site-footer />
</div>
@endsection
