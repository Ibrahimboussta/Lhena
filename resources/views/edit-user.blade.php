@extends('layouts.index')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <div class="bg-white shadow rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6">Modifier l'utilisateur</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-2 font-medium">Nom</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <!-- Add more fields as needed -->
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
