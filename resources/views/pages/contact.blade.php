@extends('layouts.index')
@section('content')

    <section class="px-6 sm:px-16 py-20">
        <h1 class="text-4xl font-bold pt-8">Contactez-nous</h1>

        <div class="max-w-2xl flex flex-col gap-y-2 py-5 ">
            <p class="font-bold text-[15px]">Envoyer un message</p>
            <p class="text-sm font-medium">Nous serions ravis de vous entendre et de répondre à toutes vos questions.
                N’hésitez pas à nous écrire, nous vous répondrons dans les plus brefs délais !</p>
        </div>

        <div class="mx-auto max-w-screen-xl  sm:px-0">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">

                <div class="rounded-lg p-8 shadow-md lg:col-span-3 border border-[#25D366]">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="sr-only" for="name">Nom</label>
                            <input class="w-full bg-gray-100 rounded-lg border-gray-200 p-3 text-sm" placeholder="Nom"
                                type="text" id="name" name='name' />
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="sr-only" for="email">Email</label>
                                <input class="w-full rounded-lg bg-gray-100 border-gray-200 p-3 text-sm"
                                    placeholder="Adresse email" type="email" id="email" name='email' />
                            </div>

                            <div>
                                <label class="sr-only" for="phone">Téléphone</label>
                                <input class="w-full rounded-lg bg-gray-100 border-gray-200 p-3 text-sm"
                                    placeholder="Numéro de téléphone" type="number" id="phone" name = 'phone' />
                            </div>
                        </div>

                        <div>
                            <label class="sr-only" for="message">Message</label>

                            <textarea class="w-full bg-gray-100 rounded-lg border-gray-200 p-3 text-sm" placeholder="Message" rows="8"
                                id="message" name = 'message' ></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="inline-block w-full rounded-lg bg-[#E7C873] px-5 py-3 font-medium text-black sm:w-auto">
                                Envoyer la demande
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-2">
                    <p class="text-2xl font-bold">
                        Appelez-nous
                    </p>
                    <p class="text-sm pt-3 ">
                        Appelez-nous dès maintenant et bénéficiez d’un accompagnement personnalisé par notre équipe
                        d’experts. Nous sommes à votre disposition pour répondre à toutes vos questions et vous aider à
                        concrétiser vos projets immobiliers. </p>

                    <p class="text-2xl font-bold pt-3 flex  items-center gap-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 text-[#25D366]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <a href="tel:+212634262436" class="text-[#25D366]">+212 634-262-436</a>

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
                        <span class="flex-1 text-base-content">Quels sont les critères pour acheter un bien immobilier ?</span>
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
                            <div class="space-y-2 leading-relaxed">Les critères varient selon le type de bien, la localisation et le budget. Il est essentiel de vérifier la conformité légale du bien, de prendre en compte la situation géographique, et de s’assurer que le financement est en place.</div>
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
                            <div class="space-y-2 leading-relaxed">La valeur d’un bien immobilier dépend de plusieurs facteurs, notamment sa localisation, sa superficie, son état général, et les prix du marché local. Une estimation professionnelle est souvent recommandée pour obtenir une évaluation précise.</div>
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
                            <div class="space-y-2 leading-relaxed">Le processus inclut la recherche du bien, la signature du contrat de vente, la demande de financement (si nécessaire), la signature de l'acte notarié, et enfin la remise des clés. Il est important de bien comprendre chaque étape et de s'assurer que tous les documents légaux sont en ordre.</div>
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
    </script>

@endsection
