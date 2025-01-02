<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('banners.update', $banner) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $banner->title)" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="subtitle" :value="__('Subtitle')" />
                            <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="old('subtitle', $banner->subtitle)" />
                            <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Current Image')" />
                            <img src="{{ Storage::url('banners/' . $banner->image) }}" alt="{{ $banner->title }}" class="h-32 object-cover mt-2">

                            <x-input-label for="new_image" :value="__('New Image (leave empty to keep current)')" class="mt-4" />
                            <input type="file" id="new_image" name="image" class="mt-1 block w-full" accept="image/*">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="order" :value="__('Order')" />
                            <x-text-input id="order" class="block mt-1 w-full" type="number" name="order" :value="old('order', $banner->order)" />
                            <x-input-error :messages="$errors->get('order')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-4">
                            <a href="{{ route('banners.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-700 text-white font-semibold rounded-lg shadow-md hover:from-gray-600 hover:to-gray-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancel
                            </a>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ __('Update Banner') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
