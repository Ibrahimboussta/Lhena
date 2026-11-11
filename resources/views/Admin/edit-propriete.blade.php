@extends('layouts.index')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 pt-20 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="px-6 sm:px-8 py-8 border-b border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('ui.admin_edit_property') }}</h1>
                <p class="text-gray-600">{{ __('ui.admin_update_property_intro') }}</p>
            </div>

            <!-- Form Content -->
            <div class="p-6 sm:p-8">
                <form action="{{ route('proprites.update', $property->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-red-700 font-semibold mb-2">{{ __('ui.admin_fix_errors') }}</p>
                            <ul class="list-none space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Main Information Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">{{ __('ui.admin_main_information') }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_title') }} *</label>
                                <input type="text" name="title" value="{{ old('title', $property->title) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_property_type') }} *</label>
                                <select name="property_type" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                                    <option value="appartement" {{ strtolower(old('property_type', $property->property_type)) === 'appartement' ? 'selected' : '' }}>{{ __('ui.admin_apartment') }}</option>
                                    <option value="maison" {{ strtolower(old('property_type', $property->property_type)) === 'maison' ? 'selected' : '' }}>{{ __('ui.admin_house') }}</option>
                                    <option value="duplex" {{ strtolower(old('property_type', $property->property_type)) === 'duplex' ? 'selected' : '' }}>{{ __('ui.admin_duplex') }}</option>
                                    <option value="studio" {{ strtolower(old('property_type', $property->property_type)) === 'studio' ? 'selected' : '' }}>{{ __('ui.admin_studio') }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_city') }} *</label>
                                <input type="text" name="city" value="{{ old('city', $property->city) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_neighborhood') }} *</label>
                                <input type="text" name="neighborhood" value="{{ old('neighborhood', $property->neighborhood) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_address') }} *</label>
                                <input type="text" name="address" value="{{ old('address', $property->address) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Property Details Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">{{ __('ui.admin_property_details') }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_surface') }} *</label>
                                <input type="number" name="surface" value="{{ old('surface', $property->surface) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_bedrooms') }} *</label>
                                <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_bathrooms') }} *</label>
                                <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_price') }} *</label>
                                <input type="number" name="price" value="{{ old('price', $property->price) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">{{ __('ui.admin_pricing') }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_price_type') }}</label>
                                <input type="text" name="price_type" value="{{ old('price_type', $property->price_type) }}" placeholder="{{ __('ui.admin_price_type_placeholder') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_contact_phone') }} *</label>
                                <input type="text" name="contact_phone" value="{{ old('contact_phone', $property->contact_phone) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">{{ __('ui.admin_description') }}</h2>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_description') }}</label>
                            <textarea name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none" placeholder="{{ __('ui.admin_description_placeholder') }}">{{ old('description', $property->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Photos Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">{{ __('ui.admin_photo_gallery') }}</h2>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('ui.admin_add_photos_hint') }}</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-500 transition cursor-pointer">
                                <input type="file" name="photos[]" multiple class="hidden" id="fileInput">
                                <label for="fileInput" class="cursor-pointer">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l-3.172-3.172a4 4 0 00-5.656 0L9.172 20M21 4v20m14 0v4"></path>
                                    </svg>
                                    <p class="text-gray-600">{{ __('ui.admin_add_photos') }}</p>
                                </label>
                            </div>
                        </div>
                        @if($property->photos)
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-3">{{ __('ui.admin_current_photos') }}</p>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach(json_decode($property->photos) as $photo)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $photo) }}" class="w-full h-24 object-cover rounded-lg shadow" alt="{{ __('ui.admin_photo') }}">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition flex items-center justify-center">
                                                <span class="text-white text-sm font-semibold opacity-0 group-hover:opacity-100 transition">✓</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col gap-3 pt-6 border-t border-gray-200">
                        <button type="submit" class="w-full text-sm px-8 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold shadow-md hover:shadow-lg">
                            {{ __('ui.admin_update_property') }}
                        </button>
                        <a href="{{ route('proprites.admin') }}" class="w-full text-center px-6 py-2.5 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition font-medium">
                            {{ __('ui.admin_cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
