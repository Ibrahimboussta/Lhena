<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>
                    <a href="{{ route('publish') }}"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 dark:bg-white dark:text-black dark:hover:bg-gray-300">
                        Ajouter une propriété
                    </a>
                </div>
                <div class="overflow-x-auto pt-2">
                    <table
                        class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="p-3 text-left border">Image</th>
                                <th class="p-3 text-left border">Nom</th>
                                <th class="p-3 text-left border">Adresse</th>
                                <th class="p-3 text-left border">Métrage</th>
                                <th class="p-3 text-left border">Téléphone</th>
                                <th class="p-3 text-left border">Prix</th>
                                <th class="p-3 text-left border">Disponibilité</th>
                                <th class="p-3 text-left border">Statut</th>
                                <th class="p-3 text-center border">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($properties as $property)
                                @if (Auth::user()->id == $property->user_id)
                                    <tr class="border-t">
                                        <td class="p-3 border">
                                            @if ($property->photos)
                                                <button onclick="openGalleryModal({{ $property->id }})">
                                                    <img src="{{ asset('storage/' . json_decode($property->photos)[0]) }}"
                                                        alt="Property Image"
                                                        class="w-16 h-16 object-cover cursor-pointer">
                                                </button>
                                            @else
                                                No Image
                                            @endif
                                        </td>

                                        <td class="p-3 border">{{ $property->title }}</td>
                                        <td class="p-3 border">{{ $property->address }}</td>
                                        <td class="p-3 border">{{ $property->surface }} m²</td>
                                        <td class="p-3 border">{{ $property->contact_phone }}</td>
                                        <td class="p-3 border text-[#25D366]">{{ number_format($property->price, 2) }}
                                            DH</td>
                                        <td class="p-3 border">

                                            {{ $property->available_from }} / {{ $property->available_until }}

                                        </td>

                                        <td class="p-3 border">
                                            @if ($property->published)
                                                <span
                                                    class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                                    ● Publié
                                                </span>
                                            @else
                                                <span
                                                    class="px-3 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full">
                                                    ● Non Publié
                                                </span>
                                            @endif
                                        </td>



                                        <td class="p-3 text-center border">
                                            <form action="{{ route('properties.destroy', $property->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 text-sm font-medium rounded-md hover:bg-red-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                    type="submit">
                                                    <span class="sr-only">Supprimer</span>
                                                    🗑
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
<div id="galleryModal"
     class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
    <div class="bg-white p-4 rounded-lg max-w-3xl w-full relative">
        <button onclick="closeGalleryModal()"
                class="absolute top-3 right-3 text-black text-2xl">&times;</button>

        <div id="galleryContent" class="grid grid-cols-2 sm:grid-cols-3 gap-4"></div>
    </div>
</div>


<script>
    const properties = @json($properties);

    function openGalleryModal(id) {
        const modal = document.getElementById("galleryModal");
        const content = document.getElementById("galleryContent");

        const property = properties.find(p => p.id === id);
        const photos = JSON.parse(property.photos);

        // Clear old images
        content.innerHTML = "";

        // Insert all photos
        photos.forEach(photo => {
            content.innerHTML += `
                <img src="/storage/${photo}"
                     class="w-full h-40 object-cover rounded-md shadow">
            `;
        });

        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function closeGalleryModal() {
        document.getElementById("galleryModal").classList.add("hidden");
    }
</script>

</x-app-layout>
