<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Users</h2>
                    <h2 class="text-xl font-semibold mb-4 dark:text-white">
                        {{ $users->total() }} <span class="text-[#25D366] text-[15px]">Users</span>
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table
                        class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="p-3 text-left border">ID</th>
                                <th class="p-3 text-left border">Nom</th>
                                <th class="p-3 text-left border">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="p-3 border">
                                        {{ $user->id }}
                                    </td>
                                    <td class="p-3 border">{{ $user->name }}</td>
                                    <td class="p-3 border">{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                <div class="mt-4">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
