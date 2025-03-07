@extends('layouts.index')

@section('content')
{{-- !herosection --}}
<section>
	<div class="herosection flex items-center justify-center text-black text-center px-6 relative">

		<!-- Contenu du Hero -->
		<div class="z-10 max-w-2xl text-center mx-auto py-20 sm:pt-0">
			<h1 class="text-3xl md:text-6xl pt-20  font-bold leading-tight drop-shadow-lg">
				Votre Propriété, Notre Priorité.
			</h1>
			<h3 class="mt-4 text-md md:text-xl font-light drop-shadow-md">
				Confiez-nous votre bien, nous en prendrons soin comme si c'était le nôtre.
			</h3>

			<!-- Filtre centré -->
			<div
				class="z-10 max-w-5xl w-fit  flex flex-wrap md:flex-nowrap justify-center items-center gap-3 mt-5  bg-white p-3 rounded-lg shadow-md">
				<!-- Barre de recherche -->
				<input type="text" placeholder="Rechercher un bien..."
					class="w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

				<!-- Sélection du Type -->
				<select
					class="w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="">Type</option>
					<option value="appartement">Appartement</option>
					<option value="maison">Maison</option>
					<option value="terrain">Terrain</option>
				</select>

				<!-- Sélection du Quartier -->
				<select
					class="w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="">Quartier</option>
					<option value="centre">Centre-ville</option>
					<option value="residence">Résidentiel</option>
					<option value="bord">Bord de mer</option>
				</select>

				<!-- Sélection de la Ville -->
				<select
					class="w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
					<option value="">Ville</option>
					<option value="casablanca">Casablanca</option>
					<option value="rabat">Rabat</option>
					<option value="marrakech">Marrakech</option>
				</select>

				<!-- Bouton Filtrer -->
				<button class="px-4 py-2 bg-[#E7C873] text-black rounded-lg">
					Filtrer
				</button>
			</div>
		</div>

	</div> 

</section>
{{-- !endherosection --}}




@endsection
