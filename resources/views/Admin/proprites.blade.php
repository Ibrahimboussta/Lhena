<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>
                    <h2 class="text-xl font-semibold mb-4 dark:text-white"> {{ count($properties) }} <span
                            class="text-[#25D366] text-[15px]">Propriétés</span></h2>
                </div>
                <div class="overflow-x-auto">
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
                                <th class="p-3 text-center border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                @if (Auth::user()->id == $property->user_id || Auth::user()->role == 'admin')
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="p-3 border ">
                                            @if ($property->photos)
                                                <img src="{{ asset('storage/' . json_decode($property->photos)[0]) }}"
                                                    alt="Property Image" class="w-16 h-16 object-cover">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td class="p-3 border">{{ $property->title }}</td>
                                        <td class="p-3 border">
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($property->address) }}"
                                                target="_blank" class=" hover:underline">
                                                {{ $property->address }}
                                            </a>
                                        </td>
                                        <td class="p-3 border">{{ $property->surface }} m²</td>
                                        <td class="p-3 border">
                                            <a href="tel:{{ $property->contact_phone }}"
                                                class=" hover:underline">
                                                {{ $property->contact_phone }}
                                            </a>
                                        </td>
                                        <td class="p-3 border text-[#25D366]">{{ number_format($property->price, 2) }}
                                            DH</td>
                                        <td class="p-3 text-center border">
                                            <form action="{{ route('properties.admin.destroy', $property->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE') <!-- This makes the POST request act as a DELETE -->

                                                <button class="text-red-500 hover:text-red-700 transition"
                                                    type="submit">
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

</x-app-layout>
