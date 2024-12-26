<x-app-layout>
    <!-- Banner Slider -->
    <div class="relative">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($banner->image) }}" 
                             alt="{{ $banner->title }}"
                             class="w-full h-[400px] object-cover">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Search Bar -->
        <div class="mb-8">
            <div class="flex justify-center">
                <div class="w-full max-w-xl">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Cari restoran atau menu..." 
                               class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <button class="absolute right-3 top-2">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restaurant Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Restoran Populer</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($restaurants as $restaurant)
                    <x-restaurant-card :restaurant="$restaurant" />
                @endforeach
            </div>
        </div>

        <!-- Categories Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Kategori Menu</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition-shadow">
                    <img src="{{ asset('images/categories/makanan.png') }}" alt="Makanan" class="w-16 h-16 mx-auto mb-2">
                    <span class="text-sm font-medium text-gray-900">Makanan</span>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition-shadow">
                    <img src="{{ asset('images/categories/minuman.png') }}" alt="Minuman" class="w-16 h-16 mx-auto mb-2">
                    <span class="text-sm font-medium text-gray-900">Minuman</span>
                </a>
                <!-- Tambahkan kategori lainnya -->
            </div>
        </div>
    </div>
</x-app-layout>
