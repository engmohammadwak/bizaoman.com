@extends('layouts.site')

@section('title', $hero['title'])

@section('content')
<main class="page">
    <section class="page-hero">
        <span class="page-hero__eyebrow">{{ $hero['eyebrow'] }}</span>
        <h1>{{ $hero['title'] }}</h1>
        <p>{{ $hero['subtitle'] }}</p>
    </section>

    <section class="page-intro">
        <p>{{ $intro }}</p>
    </section>

    <section class="page-section">
        <h2 class="page-section__title">رحلتك معنا</h2>
        <div class="journey-grid">
            @foreach ($journey as $i => $step)
                <article class="journey-card">
                    <span class="journey-card__num">{{ $i + 1 }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="page-section">
        <h2 class="page-section__title">خدمات ريادة الأعمال</h2>
        <div class="homepage__services homepage__services--wide">
            @foreach ($services as $service)
                <article class="homepage__service-card">
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="stats-band">
        @foreach ($stats as $stat)
            <div class="stats-band__item">
                <span class="stats-band__value">{{ $stat['value'] }}</span>
                <span class="stats-band__label">{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </section>

    <section class="homepage__contact">
        <h2>{{ $contact['title'] }}</h2>
        <p>{{ $contact['subtitle'] }}</p>
        <a class="homepage__button" href="{{ route('legacy.page', 'contact') }}">{{ $contact['button'] }}</a>
    </section>
</main>
@endsection
