<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <x-container>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="max-w-full max-h-[500px] overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ Storage::url('restaurants/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                        class="w-full h-auto object-cover rounded-lg">
                </div>

                <div class="p-6 flex flex-col justify-center bg-white rounded-lg shadow-md">
                    <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $restaurant->name }}</h1>

                    <div class="space-y-4">
                        <div class="flex items-center text-gray-700">
                            <svg class="h-6 w-6 mr-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-medium">{{ $restaurant->address }}</span>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="font-medium">{{ $restaurant->phone }}</span>
                        </div>

                        @if ($restaurant->description)
                            <div class="mt-4 text-gray-600">
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">Tentang Restoran</h2>
                                <p>{{ $restaurant->description }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-4">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Menu Makanan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($foods as $food)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ Storage::url('menus/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $food->name }}</h3>
                                @if ($food->description)
                                    <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $food->description }}</p>
                                @endif
                                <div class="flex justify-between items-center">
                                    <span class="text-red-500 font-bold text-lg">
                                        Rp {{ number_format($food->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                        {{ $food->category->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Menu Minuman</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($beverages as $beverage)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ Storage::url('menus/' . $beverage->image) }}" alt="{{ $beverage->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $beverage->name }}</h3>
                                @if ($beverage->description)
                                    <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $beverage->description }}</p>
                                @endif
                                <div class="flex justify-between items-center">
                                    <span class="text-red-500 font-bold text-lg">
                                        Rp {{ number_format($beverage->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                        {{ $beverage->category->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br><br>
            <div class="mt-12 flex justify-center space-x-4">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-100 text-blue-700 rounded-lg shadow-md hover:bg-blue-200 transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>

                <a href="{{ route('restaurants.explore') }}"
                    class="inline-flex items-center px-6 py-3 bg-green-100 text-green-700 rounded-lg shadow-md hover:bg-green-200 transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Jelajahi Restoran
                </a>

                <a href="{{ route('menus.explore') }}"
                    class="inline-flex items-center px-6 py-3 bg-red-100 text-red-700 rounded-lg shadow-md hover:bg-red-200 transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" />
                    </svg>
                    Lihat Semua Menu
                </a>
            </div>
        </x-container>
    </div>
</x-app-layout>
