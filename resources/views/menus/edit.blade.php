<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('menus.update', $menu) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="restaurant_id" :value="__('Restaurant')" />
                            <select id="restaurant_id" name="restaurant_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select Restaurant</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}"
                                        {{ old('restaurant_id', $menu->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('restaurant_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Menu Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $menu->name)" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $menu->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="price" :value="__('Price (Rp)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $menu->price)" required
                                min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="current_image" :value="__('Current Image')" />
                            <img src="{{ asset('storage/menus/' . $menu->image) }}" alt="{{ $menu->name }}" class="h-32 object-cover mt-2 rounded">

                            <x-input-label for="image" :value="__('New Image (leave empty to keep current)')" class="mt-4" />
                            <input type="file" id="image" name="image" class="mt-1 block w-full" accept="image/*">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-4">
                            <x-secondary-button tag="a" href="{{ route('menus.index') }}"
                                class="inline-flex items-center bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-primary-button
                                class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ __('Update Menu') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
