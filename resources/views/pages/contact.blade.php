@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 py-20">
        <h1 class="text-4xl font-bold pt-8">Contactez-nous</h1>

        <div class="max-w-2xl flex flex-col gap-y-2 py-5">
            <p class="font-bold text-[15px]">Envoyer un message</p>
            <p class="text-sm font-medium">
                Nous serions ravis de vous entendre et de répondre à toutes vos questions.
            </p>
        </div>

        <div class="mx-auto max-w-screen-xl">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">

                <!-- FORM -->
                <div class="rounded-lg p-8 shadow-md lg:col-span-3 border border-[#25D366]">
                    <form method="POST" action="{{ route('contact.store') }}" x-data="{
                        loading: false,
                        formData: {
                            name: '',
                            email: '',
                            phone: '',
                            message: ''
                        },
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
                    }"
                        @submit.prevent="
            const form = $event.target;
            const formData = new FormData(form);

            formData.forEach((value, key) => {
                if ($data.formData.hasOwnProperty(key)) {
                    $data.formData[key] = value;
                }
            });

            if (trackFormSubmit()) {
                form.submit();
            }
        "
                        class="space-y-4">
                        @csrf

                        <input class="w-full bg-gray-100 rounded-lg p-3 text-sm" placeholder="Nom" name="name" required>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input class="w-full bg-gray-100 rounded-lg p-3 text-sm" placeholder="Adresse email"
                                type="email" name="email" required>

                            <input id="phone" class="w-full bg-gray-100 rounded-lg p-3 text-sm"
                                placeholder="+212 612345678" name="phone" required>
                        </div>

                        <textarea class="w-full bg-gray-100 rounded-lg p-3 text-sm" placeholder="Message" rows="8" name="message"
                            required></textarea>

                        <button type="submit" class="px-6 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800"
                            :disabled="loading">
                            <span x-text="loading ? 'Envoi en cours…' : 'Envoyer la demande'"></span>
                        </button>
                    </form>

                    @if (session('success'))
                        <p class="text-green-600 text-sm mt-3">{{ session('success') }}</p>
                    @endif
                </div>


                <!-- CALL US -->
                <div class="lg:col-span-2">
                    <p class="text-2xl font-bold">Appelez-nous</p>
                    <p class="text-sm pt-3">
                        Appelez-nous dès maintenant pour un accompagnement personnalisé.
                    </p>

                    <p class="text-2xl font-bold pt-4 flex items-center gap-2">
                        📞
                        <a href="tel:+212634262436" class="text-black">
                            +212 634-262-436
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-screen-xl px-6 sm:px-16">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.239194318649!2d-7.585934225661413!3d33.599097741524126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd78482484c5%3A0xd904b09fb0a54766!2zUGxhdGVmb3JtZSBkZXMgamV1bmVzIHJvY2hlcyBub2lyZXMgLSDZhdmG2LXYqSDYp9mE2LTYqNin2Kgg2KfZhNi12K7ZiNixINin2YTYs9mI2K_Yp9ih!5e0!3m2!1sfr!2sma!4v1741740364019!5m2!1sfr!2sma"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section class="px-6 sm:px-16">
        <div class="pt-20 pb-5  mx-auto flex flex-col md:flex-row gap-12">
            <div class="flex flex-col text-left basis-1/2">
                <p class="sm:text-4xl text-3xl font-extrabold text-base-content">Questions fréquemment posées</p>
            </div>
            <ul class="basis-1/2">
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Quels sont les critères pour acheter un bien immobilier
                            ?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Les critères varient selon le type de bien, la
                                localisation et le budget. Il est essentiel de vérifier la conformité légale du bien, de
                                prendre en compte la situation géographique, et de s’assurer que le financement est en
                                place.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Comment évaluer la valeur d'un bien immobilier ?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">La valeur d’un bien immobilier dépend de plusieurs
                                facteurs, notamment sa localisation, sa superficie, son état général, et les prix du marché
                                local. Une estimation professionnelle est souvent recommandée pour obtenir une évaluation
                                précise.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Quel est le processus d'achat d'une maison ?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Le processus inclut la recherche du bien, la signature
                                du contrat de vente, la demande de financement (si nécessaire), la signature de l'acte
                                notarié, et enfin la remise des clés. Il est important de bien comprendre chaque étape et de
                                s'assurer que tous les documents légaux sont en ordre.</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </section>


    <script>
        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
            content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
        }

        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', e => {
                e.target.value = e.target.value.replace(/[^0-9+]/g, '');
            });
        }
    </script>
@endsection
