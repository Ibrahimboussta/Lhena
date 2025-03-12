@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 pt-20">

        <h1 class="text-4xl font-bold pt-8">Publier une annonce</h1>


        <div class="pt-8">
            <div class="container mx-auto  border  border-[#25D366]">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Personal Information</h1>
                    <p class="text-gray-600  mb-6">Use a permanent address where you can receive mail.</p>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" placeholder="First name" class="border p-2 rounded w-full">
                            <input type="text" placeholder="Last name" class="border p-2 rounded w-full">
                        </div>
                        <div class="mb-4">
                            <input type="email" placeholder="Email address" class="border p-2 rounded w-full">
                        </div>
                        <div class="mb-4">
                            <select class="border p-2 rounded w-full">
                                <option>United States</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <input type="text" placeholder="Street address" class="border p-2 rounded w-full">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <input type="text" placeholder="City" class="border p-2 rounded w-full">
                            <input type="text" placeholder="State / Province" class="border p-2 rounded w-full">
                            <input type="text" placeholder="ZIP / Postal code" class="border p-2 rounded w-full">
                        </div>
                        <div class="flex justify-end">
                            @auth
                                <button class="bg-black text-white px-4 py-2 rounded ">Submit</button>
                                
                            @endauth
                        
                            @guest
                                <a href="{{ route('register') }}" class="bg-[#E7C873] text-black px-4 py-2 rounded inline-block">
                                    Submit
                                </a>
                            @endguest
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection
