<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>

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
                                <th class="p-3 text-center border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="p-3 border">
                                    <img src="{{ asset('images/appart2.jpg') }}" alt="Maison"
                                        class="w-12 h-12 rounded-md object-cover">
                                </td>
                                <td class="p-3 border">Villa Moderne</td>
                                <td class="p-3 border">123 Rue de Paris, France</td>
                                <td class="p-3 border">200m²</td>
                                <td class="p-3 border">+33 6 12 34 56 78</td>
                                <td class="p-3 border font-semibold text-green-600">500,000€</td>
                                <td class="p-3 text-center border">
                                    <button class="text-red-500 hover:text-red-700 transition">
                                        🗑
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3 border">
                                    <img src="{{ asset('images/appart1.jpg') }}" alt="Maison"
                                        class="w-12 h-12 rounded-md object-cover">
                                </td>
                                <td class="p-3 border">Appartement Luxe</td>
                                <td class="p-3 border">45 Avenue Champs-Élysées, Paris</td>
                                <td class="p-3 border">150m²</td>
                                <td class="p-3 border">+33 6 87 65 43 21</td>
                                <td class="p-3 border font-semibold text-green-600">750,000€</td>
                                <td class="p-3 text-center border">
                                    <button class="text-red-500 hover:text-red-700 transition">
                                        🗑
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
