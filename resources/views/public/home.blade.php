<x-app-layout>
    @slot('title', 'Home')

    <div class="bg-gradient-to-r from-red-500 to-red-700 py-24 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <x-container>
            <div class="text-center relative z-10">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">Selamat Datang di TELYU FOOD</h1>
                <p class="mt-4 text-xl md:text-2xl text-white/90 max-w-2xl mx-auto">Temukan makanan favoritmu, lihat event seru, dan nikmati restoran
                    terbaik di University!</p>
                <div class="mt-8 space-x-4 animate-fade-in-up">
                    <a href="#restaurants"
                        class="px-8 py-4 bg-white text-red-500 font-medium rounded-full shadow-lg hover:bg-gray-100 transition-all duration-300 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Jelajahi Restoran
                    </a>
                    <a href="#events"
                        class="px-8 py-4 bg-transparent text-white font-medium rounded-full shadow-lg hover:bg-red-600 transition-all duration-300 border-2 border-white inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Lihat Event
                    </a>
                </div>
            </div>
        </x-container>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .swiper-slide {
            height: auto;
        }
    </style>

    <!-- Events Section -->
    <div class="py-12 bg-gradient-to-br from-blue-50 to-white">
        <x-container>
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Event yang Akan Datang</h2>
                <p class="text-gray-600 text-lg">Jangan lewatkan berbagai acara menarik yang kami adakan!</p>
            </div>

            <div class="swiper eventSwiper">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group relative">
                                <div class="relative">
                                    <img src="{{ Storage::url('banners/' . $banner->image) }}" alt="{{ $banner->title }}"
                                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">

                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent">
                                        <div class="absolute bottom-4 left-4">
                                            <span class="text-white font-semibold bg-indigo-600 px-4 py-1 rounded-full text-sm">
                                                {{ \Carbon\Carbon::parse($banner->event_date)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-indigo-700 transition duration-300">
                                        {{ $banner->title }}
                                    </h3>

                                    @if ($banner->subtitle)
                                        <p class="text-gray-600 mb-4 line-clamp-2">
                                            {{ $banner->subtitle }}
                                        </p>
                                    @endif

                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items-center space-x-2 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-sm">
                                                {{ $banner->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-4 mt-8 justify-center">
                    <button
                        class="prev-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        class="next-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </x-container>
    </div>

    <style>
        .swiper-slide {
            height: auto;
        }
    </style>

    <!-- Search Hero Section -->
    <div class="py-12">
        <x-container>
            <div class="text-center">
                <h2 class="text-4xl font-bold text-dark sm:text-5xl">Cari Restoran Favorit</h2>
                <p class="mt-4 text-lg text-red-500">Cari restoran sekitar kampus University</p>

                <form action="{{ route('restaurants.explore') }}" method="GET" class="mt-8 flex justify-center max-w-2xl mx-auto">
                    <div class="relative w-full">
                        <input type="text" name="search"
                            class="w-full px-6 py-4 rounded-full border-2 border-red-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-300 text-gray-700 placeholder-gray-400"
                            placeholder="Cari nama restoran...">
                        <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2 bg-red-600 text-white font-medium rounded-full hover:bg-red-700 transition-colors">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </x-container>
    </div>

    <!-- Restaurants Section -->
    <div class="py-12 bg-gray-50">
        <x-container>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Restaurants</h2>
                <a href="{{ route('restaurants.explore') }}" class="text-red-500 hover:text-red-600 font-medium">
                    View All →
                </a>
            </div>

            <div class="swiper restaurantSwiper">
                <div class="swiper-wrapper">
                    @foreach ($restaurants as $restaurant)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-300 group relative">
                                <div class="relative">
                                    <img src="/storage/restaurants/{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0">
                                        <div class="absolute bottom-2 left-2 flex space-x-2">
                                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ $restaurant->opening_hours }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-700 transition duration-300">
                                        {{ $restaurant->name }}
                                    </h3>

                                    @if ($restaurant->description)
                                        <p class="mt-2 text-sm text-gray-600 line-clamp-2 mb-4">
                                            {{ $restaurant->description }}
                                        </p>
                                    @endif

                                    <div class="space-y-2">
                                        <div class="flex items-center text-gray-600 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ Str::limit($restaurant->address, 30) }}
                                        </div>

                                        <div class="flex items-center text-gray-600 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            {{ $restaurant->phone }}
                                        </div>
                                    </div>

                                    <div class="mt-4 flex justify-between items-center">
                                        <div class="text-sm text-gray-500 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Added {{ $restaurant->created_at->diffForHumans() }}
                                        </div>

                                        <a href="{{ route('explore.restaurants.show', $restaurant) }}"
                                            class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm flex items-center group">
                                            View Details
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 ml-1 group-hover:translate-x-1 transition duration-300" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-4 mt-8 justify-center">
                    <button
                        class="prev-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        class="next-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </x-container>
    </div>

    <!-- Food Section -->
    <div class="py-12">
        <x-container>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Menu Makanan</h2>
                <a href="{{ route('foods.index') }}" class="text-red-500 hover:text-red-600 font-medium">
                    View All →
                </a>
            </div>

            <div class="swiper foodSwiper">
                <div class="swiper-wrapper">
                    @foreach ($foods as $menu)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-300 group relative">
                                <div class="relative">
                                    <img src="{{ Storage::url('menus/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">

                                    <div class="absolute top-2 right-2">
                                        <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">
                                            {{ $menu->category->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition duration-300">
                                            {{ $menu->name }}
                                        </h3>
                                        <span class="text-red-500 font-bold text-lg">
                                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    @if ($menu->description)
                                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                                            {{ $menu->description }}
                                        </p>
                                    @endif

                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                            </svg>
                                            {{ $menu->restaurant->name }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-4 mt-8 justify-center">
                    <button
                        class="prev-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        class="next-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </x-container>
    </div>

    <!-- Beverage Section -->
    <div class="py-12 bg-gray-50">
        <x-container>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Menu Minuman</h2>
                <a href="{{ route('beverages.index') }}" class="text-red-500 hover:text-red-600 font-medium">
                    View All →
                </a>
            </div>

            <div class="swiper beverageSwiper">
                <div class="swiper-wrapper">
                    @foreach ($beverages as $menu)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-300 group relative">
                                <div class="relative">
                                    <img src="{{ Storage::url('menus/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">

                                    <div class="absolute top-2 right-2">
                                        <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs">
                                            {{ $menu->category->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition duration-300">
                                            {{ $menu->name }}
                                        </h3>
                                        <span class="text-red-500 font-bold text-lg">
                                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    @if ($menu->description)
                                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                                            {{ $menu->description }}
                                        </p>
                                    @endif

                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                            </svg>
                                            {{ $menu->restaurant->name }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-4 mt-8 justify-center">
                    <button
                        class="prev-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        class="next-button w-12 h-12 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors flex items-center justify-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </x-container>
    </div>

    @push('scripts')
        <script>
            const eventSwiper = new Swiper('.eventSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });

            const restaurantSwiper = new Swiper('.restaurantSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });

            const foodSwiper = new Swiper('.foodSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });

            const beverageSwiper = new Swiper('.beverageSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
