@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 py-20">
        <div class="sm:flex items-center max-w-screen-xl">
            <div class="sm:w-1/2 p-10">
                <div class="image object-center text-center">
                    <img src="{{ asset('images/appart1.jpg') }}" alt="Appartement">
                </div>
            </div>
            <div class="sm:w-1/2 p-5">
                <div class="text">
                    <span class="text-gray-500 border-b-2 border-[#25D366] uppercase">Qui sommes-nous ?</span>
                    <h2 class="my-4 font-bold text-3xl sm:text-4xl">À propos de <span class="text-[#25D366]">nous</span></h2>
                    <p class="text-gray-700">
                        Nous sommes une agence immobilière dédiée à l’accompagnement personnalisé dans la recherche de biens
                        immobiliers. Notre équipe passionnée et expérimentée vous aide à trouver la maison, l’appartement ou
                        le terrain idéal pour vos projets.
                    </p>
                </div>
            </div>
        </div>
        <div class="h-full w-full pt-12 p-4">
            <div class="grid gap-14 md:grid-cols-3 md:gap-5">
                <!-- Première partie -->
                <div class="rounded-xl bg-white p-6 text-center border border-[#e0dede] shadow">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full bg-[#25D366] shadow-lg shadow-[#25D366]/40">
                        <!-- Nouvelle icône -->
                        <svg class="h-8 w-8 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                          </svg>
                          
                    </div>
                    <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">ACHAT </br> IMMOBILIER</h1>
                    <p class="px-4 text-gray-500">Trouvez facilement votre futur bien immobilier. Nos experts vous accompagnent tout au long du processus d'achat. Que vous soyez primo-accédant ou investisseur, nous avons des solutions adaptées à votre budget et vos besoins.</p>
                </div>
        
                <!-- Deuxième partie -->
                <div data-aos-delay="150" class="rounded-xl bg-white p-6 text-center border border-[#e0dede] shadow">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-black shadow-black/40">
                        <!-- Nouvelle icône -->
                        <svg class="h-8 w-8 text-green-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                          </svg>
                          
                    </div>
                    <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">LOCATION IMMOBILIER</h1>
                    <p class="px-4 text-gray-500">Que vous cherchiez à louer un appartement ou une maison, nous vous proposons une sélection de biens à louer qui correspondent à vos critères. Découvrez nos options et trouvez votre prochain logement idéal dans les meilleurs quartiers.</p>
                </div>
        
                <!-- Troisième partie -->
                <div data-aos-delay="300" class="rounded-xl bg-white p-6 text-center border border-[#e0dede] shadow">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-[#25D366]  shadow-[#25D366]/40">
                        <!-- Nouvelle icône -->
                        <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3" />  <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3" />  <circle cx="15" cy="9" r="1"  /></svg>
                    </div>
                    <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">VOTRE PROJET IMMOBILIER</h1>
                    <p class="px-4 text-gray-500">Nous vous aidons à concrétiser votre projet immobilier. Que vous souhaitiez acheter, vendre ou louer, notre équipe d'experts vous guide à chaque étape pour vous assurer que votre projet soit un succès. Ensemble, faisons avancer votre projet immobilier.</p>
                </div>
            </div>
        </div>
        
    </section>
@endsection
