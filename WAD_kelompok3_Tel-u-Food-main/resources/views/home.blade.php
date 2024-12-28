<x-app-layout>
    @slot('title', 'Home')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <x-container>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Event yang akan datang</h2>
                <div class="flex gap-4">
                    <button
                        class="prev-button w-10 h-10 flex items-center justify-center rounded-full bg-white shadow hover:bg-gray-50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        class="next-button w-10 h-10 flex items-center justify-center rounded-full bg-white shadow hover:bg-gray-50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper bannerSwiper">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-2xl overflow-hidden h-full flex flex-col">
                                <!-- Image container dengan aspect ratio fixed -->
                                <div class="aspect-square w-full relative">
                                    <img src="{{ Storage::url('banners/' . $banner->image) }}" alt="{{ $banner->title }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <!-- Content -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $banner->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">{{ $banner->subtitle }}</p>
                                    <div class="flex items-center text-gray-500 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm">{{ \Carbon\Carbon::parse($banner->event_date)->format('F d, Y') }}</span>
                                    </div>
                                    <a href="#" class="text-blue-500 hover:text-blue-700 text-sm font-medium">
                                        Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-container>
    </div>

    <style>
        .swiper-slide {
            height: auto;
        }
    </style>

    @push('scripts')
        <script>
            const swiper = new Swiper('.bannerSwiper', {
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
        </script>
    @endpush
</x-app-layout>
