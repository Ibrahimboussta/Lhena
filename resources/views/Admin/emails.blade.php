<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Emails</h2>
                    <h2 class="text-xl font-semibold mb-4 dark:text-white"> {{ count($emails) }} <span
                            class="text-[#25D366] text-[15px] ">Emails</span></h2>
                </div>
                <div class="overflow-x-auto">
                    <table
                        class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                               
                                
                                <th class="p-3 text-left border">Emails</th>
                                <th class="p-3 text-center border">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emails as $email)
                                @if (Auth::user()->id == $email->user_id || Auth::user()->role == 'admin')
                                    <tr class="border-t hover:bg-gray-50">
                                        
                                        <td class="p-3 border">{{ $email->email }}</td>
                                      
                                        <td class="p-3 text-center border">
                                            <form action="{{ route('mailing.destroy', $email->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- Laravel utilise cette directive pour simuler une requête DELETE -->
                                                
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
            </div>

        </div>
    </div>

</x-app-layout>
