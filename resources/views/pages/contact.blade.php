@extends('layouts.index')
@section('title', 'Sorvarent - Contact')
@section('content')
<style>
    .contact-page {
        min-height: 100vh;
        background: #f3f8f5;
        color: #17251f;
    }

    .contact-container {
        width: min(100% - 3rem, 1200px);
        margin: 0 auto;
    }

    .contact-main {
        padding: 6rem 0 3.5rem;
    }

    .contact-heading {
        margin-bottom: 1.5rem;
    }

    .contact-eyebrow {
        color: #806639;
        font-size: 0.62rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
    }

    .contact-heading h1 {
        margin-top: 0.65rem;
        color: #17251f;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 650;
        letter-spacing: -0.045em;
        line-height: 1.1;
    }

    .contact-heading p {
        max-width: 43rem;
        margin-top: 0.65rem;
        color: #68746d;
        font-size: 0.85rem;
        line-height: 1.75;
    }

    .contact-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(17rem, 0.9fr);
        align-items: start;
        gap: 1.25rem;
    }

    .contact-card {
        border: 1px solid #e4ebe5;
        border-radius: 0.85rem;
        background: #fff;
        padding: clamp(1.15rem, 3vw, 1.75rem);
        box-shadow: 0 8px 24px rgba(27, 55, 41, 0.06);
    }

    .contact-form-heading {
        margin-bottom: 1.2rem;
    }

    .contact-form-heading h2 {
        margin-top: 0.45rem;
        color: #17251f;
        font-size: 1.15rem;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    .contact-form-heading p {
        margin-top: 0.3rem;
        color: #77817a;
        font-size: 0.72rem;
        line-height: 1.6;
    }

    .contact-form {
        display: grid;
        gap: 0.9rem;
    }

    .contact-field label {
        display: block;
        margin-bottom: 0.35rem;
        color: #4e5b53;
        font-size: 0.66rem;
        font-weight: 600;
    }

    .contact-field input,
    .contact-field textarea {
        display: block;
        width: 100%;
        border: 1px solid #dfe6e0;
        border-radius: 0.55rem;
        background: #f9fbf9;
        padding: 0.7rem 0.8rem;
        color: #29332d;
        font: inherit;
        font-size: 0.72rem;
        transition: border-color 160ms ease, box-shadow 160ms ease, background 160ms ease;
    }

    .contact-field input {
        min-height: 2.7rem;
    }

    .contact-field textarea {
        min-height: 8rem;
        resize: vertical;
        line-height: 1.6;
    }

    .contact-field input::placeholder,
    .contact-field textarea::placeholder {
        color: #9aa39c;
    }

    .contact-field input:focus,
    .contact-field textarea:focus {
        border-color: #9b7a46;
        outline: none;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(155, 122, 70, 0.14);
    }

    .contact-field__control {
        position: relative;
    }

    .contact-field__control svg {
        position: absolute;
        top: 50%;
        left: 0.75rem;
        width: 1rem;
        height: 1rem;
        color: #89938c;
        pointer-events: none;
        transform: translateY(-50%);
    }

    .contact-field__control input {
        padding-left: 2.2rem;
    }

    .contact-fields-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.8rem;
    }

    .contact-submit {
        display: inline-flex;
        min-height: 2.75rem;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border: 1px solid #6f5127;
        border-radius: 0.55rem;
        background: #76582d;
        padding: 0.7rem 1rem;
        color: #fff;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        box-shadow: 0 5px 12px rgba(80, 57, 25, 0.14);
        transition: background-color 160ms ease, transform 160ms ease, opacity 160ms ease;
    }

    .contact-submit:hover {
        transform: translateY(-1px);
        background: #5f4522;
    }

    .contact-submit:disabled {
        cursor: wait;
        opacity: 0.7;
    }

    .contact-consent-note {
        align-self: center;
        color: #818a83;
        font-size: 0.62rem;
        line-height: 1.55;
    }

    .contact-form-footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.85rem;
        margin-top: 0.15rem;
    }

    .contact-success {
        margin-bottom: 1rem;
        border: 1px solid #cce4d3;
        border-radius: 0.55rem;
        background: #f0f8f2;
        padding: 0.7rem 0.85rem;
        color: #22623c;
        font-size: 0.75rem;
    }

    .contact-side {
        display: grid;
        gap: 1rem;
    }

    .contact-side-card {
        border: 1px solid #e4ebe5;
        border-radius: 0.8rem;
        background: #fff;
        padding: 1.2rem;
        box-shadow: 0 6px 20px rgba(27, 55, 41, 0.05);
    }

    .contact-side-card__heading {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .contact-side-card__icon {
        display: grid;
        width: 2.25rem;
        height: 2.25rem;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 0.6rem;
        background: #f1e8d7;
        color: #745a30;
    }

    .contact-side-card__icon svg {
        width: 1rem;
        height: 1rem;
    }

    .contact-side-card h2 {
        color: #17251f;
        font-size: 0.8rem;
        font-weight: 650;
    }

    .contact-side-card p {
        margin-top: 0.25rem;
        color: #748078;
        font-size: 0.66rem;
        line-height: 1.6;
    }

    .contact-phone {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: 0.7rem;
        color: #183e32;
        font-size: 0.83rem;
        font-weight: 650;
        text-decoration: none;
    }

    .contact-whatsapp {
        border-color: #183f34;
        background: #123d33;
        color: #fff;
    }

    .contact-whatsapp .contact-side-card__icon {
        background: rgba(255, 255, 255, 0.12);
        color: #e8d5a5;
    }

    .contact-whatsapp h2 {
        color: #fff;
    }

    .contact-whatsapp p {
        color: rgba(255, 255, 255, 0.72);
    }

    .contact-whatsapp__link {
        display: inline-flex;
        min-height: 2.5rem;
        align-items: center;
        gap: 0.45rem;
        margin-top: 0.85rem;
        border: 1px solid rgba(233, 213, 165, 0.4);
        border-radius: 0.5rem;
        background: #94703b;
        padding: 0.6rem 0.8rem;
        color: #fff;
        font-size: 0.65rem;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 160ms ease;
    }

    .contact-whatsapp__link:hover {
        background: #7d5c30;
        color: #fff;
    }

    .contact-faq {
        padding: 2rem 0 4.5rem;
    }

    .contact-faq__heading {
        max-width: 42rem;
        margin: 0 auto 1.4rem;
        text-align: center;
    }

    .contact-faq__heading h2 {
        margin-top: 0.45rem;
        color: #17251f;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 600;
        letter-spacing: -0.04em;
    }

    .contact-faq__heading p {
        margin-top: 0.45rem;
        color: #748078;
        font-size: 0.7rem;
        line-height: 1.65;
    }

    .contact-faq__list {
        max-width: 50rem;
        margin: 0 auto;
        display: grid;
        gap: 0.45rem;
    }

    .contact-faq__item {
        overflow: hidden;
        border: 1px solid #e3ebe5;
        border-radius: 0.65rem;
        background: #fff;
        box-shadow: 0 3px 10px rgba(27, 55, 41, 0.035);
    }

    .contact-faq__question {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        border: 0;
        background: transparent;
        padding: 0.9rem 1rem;
        color: #334139;
        font-size: 0.72rem;
        font-weight: 600;
        text-align: left;
    }

    .contact-faq__plus {
        display: grid;
        width: 1.5rem;
        height: 1.5rem;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 50%;
        background: #eef4f0;
        color: #365447;
        font-size: 1rem;
        font-weight: 500;
        transition: transform 180ms ease, background-color 180ms ease;
    }

    .contact-faq__question[aria-expanded="true"] .contact-faq__plus {
        transform: rotate(45deg);
        background: #f1e8d7;
        color: #745a30;
    }

    .contact-faq__answer {
        max-height: 0;
        overflow: hidden;
        color: #6d7871;
        font-size: 0.7rem;
        line-height: 1.7;
        transition: max-height 240ms ease;
    }

    .contact-faq__answer-inner {
        padding: 0 1rem 1rem;
    }

    .contact-faq__note {
        max-width: 50rem;
        margin: 1rem auto 0;
        border: 1px solid #e3ebe5;
        border-radius: 0.65rem;
        background: #edf4f0;
        padding: 0.85rem 1rem;
        color: #647168;
        font-size: 0.65rem;
        line-height: 1.6;
    }

    .contact-faq__note strong {
        display: block;
        margin-bottom: 0.15rem;
        color: #34443c;
        font-size: 0.68rem;
    }

    @media (max-width: 760px) {
        .contact-container {
            width: min(100% - 2rem, 1200px);
        }

        .contact-layout {
            grid-template-columns: minmax(0, 1fr);
        }

        .contact-side {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 520px) {
        .contact-main {
            padding-top: 5.5rem;
        }

        .contact-fields-row,
        .contact-side {
            grid-template-columns: minmax(0, 1fr);
        }

        .contact-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .contact-submit {
            width: 100%;
        }

        .contact-faq {
            padding-bottom: 3rem;
        }
    }
</style>

<main class="contact-page">
    <section class="contact-container contact-main" aria-labelledby="contact-title">
        <div class="contact-heading">
            <p class="contact-eyebrow">{{ __('ui.contact_intro') }}</p>
            <h1 id="contact-title">{{ __('ui.contact_title') }}</h1>
            <p>{{ __('ui.contact_description') }}</p>
        </div>

        <div class="contact-layout">
            <div class="contact-card">
                <div class="contact-form-heading">
                    <p class="contact-eyebrow">{{ __('ui.customer_service') }}</p>
                    <h2>{{ __('ui.contact_form_title') }}</h2>
                    <p>{{ __('ui.contact_form_description') }}</p>
                </div>

                @if (session('success'))
                    <p class="contact-success" role="status">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="contact-form" x-data="{
                    loading: false,
                    formData: { name: '', email: '', phone: '', message: '' },
                    trackFormSubmit() {
                        if (typeof gtag === 'function') {
                            gtag('event', 'form_submit', {
                                event_category: 'Contact',
                                event_label: 'Contact Form Submission',
                                form_id: 'contact_form',
                                form_name: 'Contact Form',
                                form_location: window.location.pathname,
                                form_fields: Object.keys(this.formData)
                                    .filter(key => this.formData[key] !== '')
                                    .join(','),
                                value: 1
                            });

                            Object.keys(this.formData).forEach(field => {
                                if (this.formData[field]) {
                                    gtag('event', 'form_field_complete', {
                                        event_category: 'Form Interaction',
                                        event_label: `Contact Form - ${field} completed`,
                                        form_id: 'contact_form',
                                        field_name: field,
                                        field_type: field === 'email' ? 'email' : 'text',
                                        value: 1
                                    });
                                }
                            });
                        }

                        this.loading = true;
                        return true;
                    }
                }" @submit.prevent="
                    const form = $event.target;
                    const formData = new FormData(form);
                    formData.forEach((value, key) => {
                        if (Object.prototype.hasOwnProperty.call($data.formData, key)) {
                            $data.formData[key] = value;
                        }
                    });
                    if (trackFormSubmit()) form.submit();
                }">
                    @csrf

                    <div class="contact-field">
                        <label for="contact-name">{{ __('ui.full_name') }}</label>
                        <input id="contact-name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" placeholder="ex. Samira El Amrani" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="contact-fields-row">
                        <div class="contact-field">
                            <label for="contact-email">{{ __('ui.email') }}</label>
                            <div class="contact-field__control">
                                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke-width="1.6" />
                                    <path d="m4.5 7 7.5 6 7.5-6" stroke-width="1.6" />
                                </svg>
                                <input id="contact-email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="nom@exemple.ma" required>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div class="contact-field">
                            <label for="phone">{{ __('ui.phone_number') }}</label>
                            <div class="contact-field__control">
                                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M5 3.5h3l1.5 4-2 1.5a15 15 0 0 0 7.5 7.5l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17.5 17.5 0 0 1 3 5.7 2 2 0 0 1 5 3.5Z" />
                                </svg>
                                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" placeholder="+212 6 12 34 56 78" required>
                            </div>
                            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="contact-message">{{ __('ui.your_message') }}</label>
                        <textarea id="contact-message" name="message" rows="5" placeholder="{{ __('ui.message_placeholder') }}" required>{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-1" />
                    </div>

                    <div class="contact-form-footer">
                        <button type="submit" class="contact-submit" :disabled="loading">
                            <span x-text="loading ? @js(__('ui.sending')) : @js(__('ui.send_request'))"></span>
                            <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                            </svg>
                        </button>
                        <p class="contact-consent-note">{{ __('ui.privacy_note') }}</p>
                    </div>
                </form>
            </div>

            <aside class="contact-side" aria-label="{{ __('ui.contact_methods') }}">
                <section class="contact-side-card">
                    <div class="contact-side-card__heading">
                        <span class="contact-side-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3.5h3l1.5 4-2 1.5a15 15 0 0 0 7.5 7.5l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17.5 17.5 0 0 1 3 5.7 2 2 0 0 1 5 3.5Z" />
                            </svg>
                        </span>
                        <div>
                            <h2>{{ __('ui.talk_to_us') }}</h2>
                            <p>{{ __('ui.call_for_help') }}</p>
                            <a class="contact-phone" href="tel:+212634262436">+212 634-262-436</a>
                        </div>
                    </div>
                </section>

                <section class="contact-side-card contact-whatsapp">
                    <div class="contact-side-card__heading">
                        <span class="contact-side-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.5 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20l1.2-4.6a8.5 8.5 0 1 1 16.3-3.9Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 8.5c.4 2.3 2.7 4.6 5 5l1.1-1.1 2 .8c-.2 1.2-.9 1.8-2.1 1.8-3.4-.2-7.3-4.1-7.5-7.5 0-1.2.6-1.9 1.8-2.1l.8 2-1.1 1.1Z" />
                            </svg>
                        </span>
                        <div>
                            <h2>{{ __('ui.whatsapp_heading') }}</h2>
                            <p>{{ __('ui.whatsapp_contact_text') }}</p>
                            <a class="contact-whatsapp__link" href="https://wa.me/212634262436" target="_blank" rel="noopener noreferrer">
                                {{ __('ui.start_conversation') }}
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>

    <section class="contact-container contact-faq" aria-labelledby="contact-faq-title">
        <div class="contact-faq__heading">
            <p class="contact-eyebrow">{{ __('ui.need_information') }}</p>
            <h2 id="contact-faq-title">{{ __('ui.faq_title') }}</h2>
            <p>{{ __('ui.faq_intro') }}</p>
        </div>

        <div class="contact-faq__list">
            <article class="contact-faq__item">
                <button class="contact-faq__question" type="button" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span>{{ __('ui.faq_buy_criteria') }}</span>
                    <span class="contact-faq__plus" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__answer">
                    <div class="contact-faq__answer-inner">{{ __('ui.faq_buy_answer') }}</div>
                </div>
            </article>

            <article class="contact-faq__item">
                <button class="contact-faq__question" type="button" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span>{{ __('ui.faq_property_value') }}</span>
                    <span class="contact-faq__plus" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__answer">
                    <div class="contact-faq__answer-inner">{{ __('ui.faq_property_value_answer') }}</div>
                </div>
            </article>

            <article class="contact-faq__item">
                <button class="contact-faq__question" type="button" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span>{{ __('ui.faq_buy_process') }}</span>
                    <span class="contact-faq__plus" aria-hidden="true">+</span>
                </button>
                <div class="contact-faq__answer">
                    <div class="contact-faq__answer-inner">{{ __('ui.faq_buy_process_answer') }}</div>
                </div>
            </article>
        </div>

        <p class="contact-faq__note">
            <strong>{{ __('ui.specific_question') }}</strong>
            {{ __('ui.contact_team_guidance') }}
        </p>
    </section>
</main>

<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const expanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
        content.style.maxHeight = expanded ? '0' : `${content.scrollHeight}px`;
    }

    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', event => {
            event.target.value = event.target.value.replace(/[^0-9+]/g, '');
        });
    }
</script>
@endsection
