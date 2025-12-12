<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>
                    <h2 class="text-xl font-semibold mb-4 dark:text-white">
                        {{ $properties->total() }} <span class="text-[#25D366] text-[15px]">Propriétés</span>
                    </h2>
                </div>
              <div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th class="p-3 text-left border">Image</th>
                <th class="p-3 text-left border">Nom</th>
                <th class="p-3 text-left border">Adresse</th>
                <th class="p-3 text-left border">Métrage</th>
                <th class="p-3 text-left border">Téléphone</th>
                <th class="p-3 text-left border">Prix</th>
                <th class="p-3 text-center border">Statut</th>
                <th class="p-3 text-center border">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                @if (Auth::user()->id == $property->user_id || Auth::user()->role == 'admin')
                    <tr class="border-t hover:bg-gray-50">

                        <!-- IMAGE + MODAL -->
                        <td class="p-3 border text-center" x-data="{ open: false }">
                            @if ($property->photos)
                                @php $photos = json_decode($property->photos); @endphp

                                <img
                                    src="{{ asset('storage/' . $photos[0]) }}"
                                    class="w-16 h-16 object-cover cursor-pointer rounded"
                                    @click="open = true"
                                >
                            @else
                                No Image
                            @endif

                            <!-- Modal -->
                            <div
                                x-show="open"
                                x-transition
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                            >
                                <div class="bg-white p-4 rounded-lg shadow-lg max-w-4xl w-full relative">

                                    <!-- Close Button -->
                                    <button
                                        class="absolute top-3 right-3 text-gray-700 text-xl font-bold hover:text-black"
                                        @click="open = false"
                                    >
                                        ✕
                                    </button>

                                    <!-- Gallery -->
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                                        @foreach ($photos as $photo)
                                            <img
                                                src="{{ asset('storage/' . $photo) }}"
                                                class="w-full h-48 object-cover rounded"
                                            >
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </td>

                        <!-- Property Title -->
                        <td class="p-3 border">{{ $property->title }}</td>

                        <!-- Address -->
                        <td class="p-3 border">
                            <a
                                href="https://www.google.com/maps/search/?api=1&query={{ urlencode($property->address) }}"
                                target="_blank"
                                class="hover:underline"
                            >
                                {{ $property->address }}
                            </a>
                        </td>

                        <!-- Surface -->
                        <td class="p-3 border">{{ $property->surface }} m²</td>

                        <!-- Phone -->
                        <td class="p-3 border">
                            <a href="tel:{{ $property->contact_phone }}" class="hover:underline">
                                {{ $property->contact_phone }}
                            </a>
                        </td>

                        <!-- Price -->
                        <td class="p-3 border text-[#25D366]">
                            {{ number_format($property->price, 2) }} DH
                        </td>

                        <!-- STATUS -->
                        <td class="p-3 text-center border">
                            <div class="flex items-center justify-center space-x-3">

                                @if ($property->published)
                                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                        Publié
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                        En attente
                                    </span>
                                @endif

                                <!-- Publish / Unpublish -->
                                <form action="{{ route('properties.toggle.publish', $property->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    @if ($property->published)
                                        <button
                                            class="text-yellow-600 hover:text-yellow-800 transition"
                                            type="submit"
                                            title="Dépublier"
                                        >
                                            👁️‍🗨️
                                        </button>
                                    @else
                                        <button
                                            class="text-green-600 hover:text-green-800 transition"
                                            type="submit"
                                            title="Publier"
                                        >
                                            ✅
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </td>

                        <!-- DELETE -->
                        <td class="p-3 text-center border">
                            <form action="{{ route('properties.admin.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-500 hover:text-red-700 transition" type="submit">
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


                {{-- Pagination Links --}}
                <div class="mt-4">
                    {{ $properties->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</x-app-layout>
