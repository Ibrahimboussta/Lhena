@extends('layouts.index')
@section('title', 'SorvaRent - À propos')
@section('content')
<style>
    .about-page {
        overflow: hidden;
        background: #f4f9f6;
        color: #17251f;
    }

    .about-container {
        width: min(100% - 3rem, 1280px);
        margin: 0 auto;
    }

    .about-hero {
        display: grid;
        min-height: 34rem;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        align-items: center;
        gap: clamp(2.5rem, 6vw, 5rem);
        padding: 6rem 0 4.5rem;
    }

    .about-hero__visual {
        position: relative;
        min-height: 26rem;
        overflow: visible;
    }

    .about-hero__image {
        position: absolute;
        inset: 0;
        overflow: hidden;
        border: 1px solid rgba(17, 59, 48, 0.1);
        border-radius: 0.9rem;
        background: #e4ebe6;
        box-shadow: 0 18px 34px rgba(31, 51, 41, 0.14);
    }

    .about-hero__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-hero__location {
        position: absolute;
        top: -0.75rem;
        right: -0.75rem;
        border: 1px solid rgba(225, 222, 214, 0.8);
        border-radius: 9999px;
        background: #fff;
        padding: 0.55rem 0.85rem;
        color: #625338;
        font-size: 0.6rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        box-shadow: 0 5px 16px rgba(25, 38, 29, 0.1);
    }

    .about-hero__caption {
        position: absolute;
        right: 1rem;
        bottom: 1rem;
        left: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.65);
        border-radius: 0.7rem;
        background: rgba(248, 249, 245, 0.95);
        padding: 0.75rem 1rem;
        box-shadow: 0 8px 20px rgba(15, 30, 22, 0.14);
    }

    .about-hero__caption-icon {
        display: grid;
        width: 2rem;
        height: 2rem;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 50%;
        background: #eee2c9;
        color: #745a30;
    }

    .about-hero__caption p {
        margin: 0;
        font-size: 0.75rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .about-hero__caption small {
        display: block;
        margin-bottom: 0.1rem;
        color: #82683a;
        font-size: 0.55rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .about-eyebrow {
        color: #806639;
        font-size: 0.62rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .about-hero__kicker {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border-radius: 9999px;
        background: #f1e8d7;
        padding: 0.4rem 0.65rem;
        color: #6f572f;
        font-size: 0.58rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .about-hero__title {
        margin-top: 0.9rem;
        color: #17251f;
        font-size: clamp(2.1rem, 4vw, 3.25rem);
        font-weight: 650;
        letter-spacing: -0.045em;
        line-height: 1.08;
    }

    .about-hero__title span {
        color: #80602d;
    }

    .about-hero__description {
        max-width: 39rem;
        margin-top: 1rem;
        color: #65716a;
        font-size: 0.83rem;
        line-height: 1.8;
    }

    .about-hero__actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1rem;
        margin-top: 1.6rem;
    }

    .about-button {
        display: inline-flex;
        min-height: 2.75rem;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border: 1px solid #6f5127;
        border-radius: 0.5rem;
        background: #76582d;
        padding: 0.7rem 1rem;
        color: #fff;
        font-size: 0.7rem;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 5px 12px rgba(80, 57, 25, 0.15);
        transition: background-color 180ms ease, transform 180ms ease;
    }

    .about-button:hover {
        transform: translateY(-1px);
        background: #5f4522;
        color: #fff;
    }

    .about-text-link {
        color: #34443c;
        font-size: 0.7rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 180ms ease;
    }

    .about-text-link:hover {
        color: #80602d;
    }

    .about-services {
        background: #edf4f0;
        padding: 4.5rem 0;
    }

    .about-section-heading {
        max-width: 42rem;
        margin: 0 auto 2rem;
        text-align: center;
    }

    .about-section-title {
        margin-top: 0.55rem;
        color: #17251f;
        font-size: clamp(1.65rem, 3vw, 2.25rem);
        font-weight: 600;
        letter-spacing: -0.04em;
    }

    .about-section-description {
        max-width: 37rem;
        margin: 0.6rem auto 0;
        color: #6e7972;
        font-size: 0.75rem;
        line-height: 1.7;
    }

    .about-services__grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }

    .about-service-card {
        display: flex;
        min-height: 13.5rem;
        flex-direction: column;
        border: 1px solid #e6ece7;
        border-radius: 0.7rem;
        background: #fff;
        padding: 1.35rem;
        box-shadow: 0 3px 12px rgba(24, 53, 39, 0.04);
        transition: transform 200ms ease, box-shadow 200ms ease;
    }

    .about-service-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(24, 53, 39, 0.09);
    }

    .about-service-card__top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.5rem;
    }

    .about-service-card__icon {
        display: grid;
        width: 2.3rem;
        height: 2.3rem;
        place-items: center;
        border-radius: 50%;
        background: #f8ecd5;
        color: #705429;
    }

    .about-service-card:nth-child(2) .about-service-card__icon {
        background: #e1f1eb;
        color: #164b3c;
    }

    .about-service-card:nth-child(3) .about-service-card__icon {
        background: #faecd7;
        color: #785b2e;
    }

    .about-service-card__tag {
        border-radius: 9999px;
        background: #edf1ee;
        padding: 0.25rem 0.55rem;
        color: #5b665f;
        font-size: 0.5rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .about-service-card h3 {
        margin-top: 1rem;
        color: #17251f;
        font-size: 0.95rem;
        font-weight: 600;
        letter-spacing: -0.02em;
    }

    .about-service-card p {
        margin-top: 0.4rem;
        color: #707a73;
        font-size: 0.7rem;
        line-height: 1.7;
    }

    .about-service-card__link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: auto;
        padding-top: 0.9rem;
        color: #76582d;
        font-size: 0.65rem;
        font-weight: 600;
        text-decoration: none;
    }

    .about-values {
        padding: 4.5rem 0;
    }

    .about-values__heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 2rem;
        margin-bottom: 1.75rem;
    }

    .about-values__title {
        max-width: 32rem;
        margin-top: 0.5rem;
        color: #17251f;
        font-size: clamp(1.65rem, 3vw, 2.2rem);
        font-weight: 600;
        letter-spacing: -0.04em;
        line-height: 1.15;
    }

    .about-values__intro {
        max-width: 25rem;
        color: #6e7972;
        font-size: 0.72rem;
        line-height: 1.75;
    }

    .about-values__grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 0.85rem;
    }

    .about-value-card {
        min-height: 9.5rem;
        border: 1px solid rgba(226, 234, 228, 0.85);
        border-radius: 0.7rem;
        background: #edf4f0;
        padding: 1rem;
    }

    .about-value-card__icon {
        display: grid;
        width: 2rem;
        height: 2rem;
        place-items: center;
        border-radius: 0.5rem;
        background: #143f34;
        color: #fff;
    }

    .about-value-card h3 {
        margin-top: 0.8rem;
        color: #17251f;
        font-size: 0.72rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .about-value-card p {
        margin-top: 0.3rem;
        color: #707a73;
        font-size: 0.62rem;
        line-height: 1.65;
    }

    .about-contact {
        position: relative;
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
        align-items: center;
        gap: 2rem;
        overflow: hidden;
        margin-bottom: 4rem;
        border: 1px solid #0e3128;
        border-radius: 0.8rem;
        background: #123d33;
        padding: clamp(1.5rem, 4vw, 2.75rem);
        color: #fff;
        box-shadow: 0 14px 28px rgba(15, 44, 35, 0.18);
    }

    .about-contact::before,
    .about-contact::after {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 17rem;
        height: 17rem;
        border: 1px solid rgba(218, 204, 161, 0.12);
        content: "";
        pointer-events: none;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .about-contact::after {
        width: 9rem;
        height: 9rem;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .about-contact__content,
    .about-contact__actions {
        position: relative;
        z-index: 1;
    }

    .about-contact__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.1);
        padding: 0.35rem 0.6rem;
        color: #e7d39f;
        font-size: 0.55rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .about-contact__title {
        max-width: 27rem;
        margin-top: 0.8rem;
        color: #fff;
        font-size: clamp(1.55rem, 3vw, 2rem);
        font-weight: 600;
        letter-spacing: -0.035em;
        line-height: 1.15;
    }

    .about-contact__description {
        max-width: 30rem;
        margin-top: 0.65rem;
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.68rem;
        line-height: 1.7;
    }

    .about-contact__actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.65rem;
    }

    .about-contact__actions .about-button {
        border-color: #9c7437;
        background: #96703a;
        white-space: nowrap;
    }

    .about-contact__actions .about-button:hover {
        background: #805e30;
    }

    .about-contact__secondary {
        display: inline-flex;
        min-height: 2.75rem;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        padding: 0.7rem 0.9rem;
        color: #fff;
        font-size: 0.68rem;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 180ms ease;
    }

    .about-contact__secondary:hover {
        background: rgba(255, 255, 255, 0.18);
        color: #fff;
    }

    @media (max-width: 900px) {
        .about-hero {
            grid-template-columns: minmax(0, 1fr);
            gap: 2.5rem;
            padding-top: 5.5rem;
        }

        .about-hero__visual {
            min-height: 24rem;
        }

        .about-hero__copy {
            max-width: 44rem;
        }

        .about-values__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .about-contact {
            grid-template-columns: minmax(0, 1fr);
        }

        .about-contact__actions {
            justify-content: flex-start;
        }
    }

    @media (max-width: 640px) {
        .about-container {
            width: min(100% - 2rem, 1280px);
        }

        .about-hero {
            min-height: auto;
            gap: 2rem;
            padding: 5rem 0 3.5rem;
        }

        .about-hero__visual {
            min-height: 20rem;
            margin-right: 0.35rem;
        }

        .about-hero__location {
            right: -0.35rem;
            font-size: 0.52rem;
        }

        .about-hero__title {
            font-size: clamp(2rem, 9vw, 2.7rem);
        }

        .about-hero__actions {
            align-items: stretch;
            flex-direction: column;
        }

        .about-button {
            width: 100%;
        }

        .about-text-link {
            text-align: center;
        }

        .about-services,
        .about-values {
            padding: 3.5rem 0;
        }

        .about-services__grid,
        .about-values__grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .about-service-card {
            min-height: 12rem;
        }

        .about-values__heading {
            align-items: flex-start;
            flex-direction: column;
            gap: 0.75rem;
        }

        .about-contact {
            margin-bottom: 2.5rem;
            padding: 1.5rem;
        }

        .about-contact__actions {
            align-items: stretch;
            flex-direction: column;
        }
    }
</style>

<main class="about-page">
    <section class="about-container about-hero" aria-labelledby="about-title">
        <div class="about-hero__visual">
            <div class="about-hero__image">
                <img src="{{ asset('images/appart1.jpg') }}" alt="{{ __('ui.property_interior_alt') }}" fetchpriority="high">
            </div>
            <span class="about-hero__location">CASABLANCA · MARRAKECH · TANGER</span>
            <div class="about-hero__caption">
                <span class="about-hero__caption-icon" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M3 10.5 12 3l9 7.5v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5v-9Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 21v-6h6v6" />
                    </svg>
                </span>
                <p><small>{{ __('ui.about_foundation') }}</small>{{ __('ui.about_expertise') }}</p>
            </div>
        </div>

        <div class="about-hero__copy">
            <span class="about-hero__kicker">
                <span aria-hidden="true">✦</span>
                {{ __('ui.who_we_are') }}
            </span>
            <h1 id="about-title" class="about-hero__title">
                {{ __('ui.about_heading') }} <span>{{ __('ui.about_heading_accent') }}</span>
            </h1>
            <p class="about-hero__description">
                {{ __('ui.about_description') }}
            </p>
            <div class="about-hero__actions">
                <a href="{{ route('proprites') }}" class="about-button">
                    {{ __('ui.discover_our_properties') }}
                    <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                    </svg>
                </a>
                <a href="#about-services" class="about-text-link">{{ __('ui.our_services') }} <span aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>

    <section id="about-services" class="about-services" aria-labelledby="about-services-title">
        <div class="about-container">
            <div class="about-section-heading">
                <p class="about-eyebrow">{{ __('ui.property_expertise') }}</p>
                <h2 id="about-services-title" class="about-section-title">{{ __('ui.our_support_areas') }}</h2>
                <p class="about-section-description">
                    {{ __('ui.support_areas_intro') }}
                </p>
            </div>

            <div class="about-services__grid">
                <article class="about-service-card">
                    <div class="about-service-card__top">
                        <span class="about-service-card__icon" aria-hidden="true">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <circle cx="7.5" cy="15.5" r="4.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11 12 8-8 2 2-2 2 2 2-2 2-2-2-4 4" />
                            </svg>
                        </span>
                        <span class="about-service-card__tag">{{ __('ui.selected_residences') }}</span>
                    </div>
                    <h3>{{ __('ui.rental_stays') }}</h3>
                    <p>{{ __('ui.rental_stays_text') }}</p>
                    <a href="{{ route('proprites') }}" class="about-service-card__link">{{ __('ui.explore_rentals') }} <span aria-hidden="true">→</span></a>
                </article>

                <article class="about-service-card">
                    <div class="about-service-card__top">
                        <span class="about-service-card__icon" aria-hidden="true">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5v10H3v-10Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 20.5v-6h8v6M7 10.5h.01M17 10.5h.01" />
                            </svg>
                        </span>
                        <span class="about-service-card__tag">{{ __('ui.search_selection') }}</span>
                    </div>
                    <h3>{{ __('ui.selection_for_you') }}</h3>
                    <p>{{ __('ui.selection_for_you_text') }}</p>
                    <a href="{{ route('proprites') }}" class="about-service-card__link">{{ __('ui.discover_listings') }} <span aria-hidden="true">→</span></a>
                </article>

                <article class="about-service-card">
                    <div class="about-service-card__top">
                        <span class="about-service-card__icon" aria-hidden="true">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 20h16M6 20V9l6-5 6 5v11M9 12h.01M15 12h.01M9 16h.01M15 16h.01M11 20v-3h2v3" />
                            </svg>
                        </span>
                        <span class="about-service-card__tag">{{ __('ui.dedicated_support') }}</span>
                    </div>
                    <h3>{{ __('ui.bespoke_project') }}</h3>
                    <p>{{ __('ui.bespoke_project_text') }}</p>
                    <a href="{{ route('contact') }}" class="about-service-card__link">{{ __('ui.meet_advisor') }} <span aria-hidden="true">→</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="about-container about-values" aria-labelledby="about-values-title">
        <div class="about-values__heading">
            <div>
                <p class="about-eyebrow">{{ __('ui.principles_ethics') }}</p>
                <h2 id="about-values-title" class="about-values__title">{{ __('ui.trust_ethics') }}</h2>
            </div>
            <p class="about-values__intro">
                {{ __('ui.trust_ethics_text') }}
            </p>
        </div>

        <div class="about-values__grid">
            <article class="about-value-card">
                <span class="about-value-card__icon" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <rect x="5" y="10" width="14" height="11" rx="2" />
                        <path stroke-linecap="round" d="M8 10V7a4 4 0 1 1 8 0v3m-4 4v3" />
                    </svg>
                </span>
                <h3>{{ __('ui.privacy_discretion') }}</h3>
                <p>{{ __('ui.privacy_discretion_text') }}</p>
            </article>
            <article class="about-value-card">
                <span class="about-value-card__icon" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8 12 2.5 2.5L16 9" />
                    </svg>
                </span>
                <h3>{{ __('ui.careful_selection') }}</h3>
                <p>{{ __('ui.careful_selection_text') }}</p>
            </article>
            <article class="about-value-card">
                <span class="about-value-card__icon" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11V5l-7-3-7 3v5c0 6.6 7 11 7 11Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4" />
                    </svg>
                </span>
                <h3>{{ __('ui.personal_support') }}</h3>
                <p>{{ __('ui.personal_support_text') }}</p>
            </article>
            <article class="about-value-card">
                <span class="about-value-card__icon" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <circle cx="9" cy="8" r="3" />
                        <circle cx="17" cy="9" r="2.5" />
                        <path stroke-linecap="round" d="M3.5 20v-1.5A5.5 5.5 0 0 1 9 13h.5a5.5 5.5 0 0 1 5.5 5.5V20m.2-6.7a4.5 4.5 0 0 1 5.3 4.5V20" />
                    </svg>
                </span>
                <h3>{{ __('ui.local_market') }}</h3>
                <p>{{ __('ui.local_market_text') }}</p>
            </article>
        </div>
    </section>

    <section class="about-container" aria-labelledby="about-contact-title">
        <div class="about-contact">
            <div class="about-contact__content">
                <span class="about-contact__eyebrow">
                    <svg aria-hidden="true" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8m-8 4h5m-8 5-2-4a9 9 0 1 1 4 3l-4 1Z" />
                    </svg>
                    {{ __('ui.privileged_welcome') }}
                </span>
                <h2 id="about-contact-title" class="about-contact__title">{{ __('ui.about_contact_title') }}</h2>
                <p class="about-contact__description">{{ __('ui.about_contact_text') }}</p>
            </div>
            <div class="about-contact__actions">
                <a href="{{ route('contact') }}" class="about-button">
                    {{ __('ui.contact_expert') }}
                    <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="5" width="18" height="16" rx="2" />
                        <path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18" />
                    </svg>
                </a>
                <a href="{{ route('proprites') }}" class="about-contact__secondary">{{ __('ui.view_properties') }}</a>
            </div>
        </div>
    </section>
</main>
@endsection
