@extends('layouts.index')
@section('content')
<section class="px-6 py-24 bg-gray-50 min-h-screen flex justify-center items-center">
  <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-8">

    <!-- Bloc gauche : Résumé de la propriété -->
    <div class="bg-white h-fit shadow-md rounded-2xl p-4 flex flex-col">

    <!-- Carousel -->
    <div class="relative w-full h-56 rounded-xl overflow-hidden mb-4">
        <div class="relative w-full h-full" id="carousel-container">
            @foreach (json_decode($property->photos) as $index => $photo)
                <img src="{{ asset('storage/' . $photo) }}"
                     alt="{{ $property->title }}"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700
                     {{ $index !== 0 ? 'opacity-0' : '' }}">
            @endforeach
        </div>

        <!-- Navigation buttons -->
        <button id="prev"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full">
            ‹
        </button>
        <button id="next"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full">
            ›
        </button>
    </div>

    <!-- Infos -->
    <h2 class="text-xl font-semibold text-gray-800">{{ $property->title }}</h2>
    <p class="text-gray-600 text-sm mt-1">{{ $property->address }}</p>
    <p class="text-2xl font-bold text-[#25D366] mt-4">{{ $property->price }} MAD</p>
</div>




    <!-- Bloc droite : Formulaire Checkout -->
    <div class="bg-white shadow-md rounded-2xl p-6" x-data="{ payment: '' }">
  <h2 class="text-2xl font-semibold mb-6 text-gray-800">Finaliser la réservation</h2>

  <!-- Formulaire infos personnelles -->
  <form action="#" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm font-medium text-gray-700">Nom complet</label>
      <input type="text" name="name"
             class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" name="email"
             class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Téléphone</label>
      <input type="tel" name="phone"
             class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
    </div>

    <!-- Section méthodes de paiement -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Méthode de paiement</label>
      <select x-model="payment"
              class="w-full mt-1 border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
        <option value="">-- Choisir --</option>
        <option value="card">Carte Bancaire</option>
        <option value="paypal">PayPal</option>
        <option value="cash">Paiement sur place</option>
      </select>
    </div>

    <!-- Bloc Carte Bancaire -->
    <div x-show="payment === 'card'" class="space-y-4 mt-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Numéro de carte</label>
        <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX"
               class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Expiration</label>
          <input type="text" name="expiry" placeholder="MM/AA"
                 class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">CVC</label>
          <input type="text" name="cvc" placeholder="123"
                 class="w-full mt-1 border rounded-md px-3 py-2 focus:ring-2 focus:ring-[#25D366] focus:outline-none">
        </div>
      </div>
    </div>

    <!-- Bloc PayPal -->
    <div x-show="payment === 'paypal'" class="mt-4">
      <button type="button"
              class="w-full bg-yellow-400 text-black py-2 rounded-lg hover:bg-yellow-500 font-semibold">
        Payer avec PayPal
      </button>
    </div>

    <!-- Bloc Cash -->
    <div x-show="payment === 'cash'" class="mt-4 text-gray-600 text-sm">
      Vous avez choisi de payer sur place.
    </div>

    <!-- Bouton final -->
    <button type="submit"
            class="w-full bg-[#25D366] text-white py-3 rounded-lg hover:bg-green-600 transition-colors font-semibold mt-6">
      Confirmer la réservation
    </button>
  </form>
</div>

  </div>
</section>


<script src="//unpkg.com/alpinejs" defer></script>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('#carousel-container img');
    function showSlide(index) {
        slides.forEach((s, i) => s.classList.toggle('opacity-0', i !== index));
    }
    document.getElementById('prev').onclick = () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    };
    document.getElementById('next').onclick = () => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    };
</script>

@endsection
