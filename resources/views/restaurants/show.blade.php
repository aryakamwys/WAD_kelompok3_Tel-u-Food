<x-app-layout>
    <!-- Restaurant Header -->
    <div class="relative h-[300px]">
        <img src="{{ Storage::url($restaurant->image) }}" 
             alt="{{ $restaurant->name }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
                <h1 class="text-3xl font-bold text-white mb-2">{{ $restaurant->name }}</h1>
                <p class="text-white text-opacity-90 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $restaurant->address }}
                </p>
            </div>
        </div>
    </div>

    <!-- Menu Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Menu Categories -->
        <div class="flex space-x-4 mb-8 overflow-x-auto pb-4">
            <button class="px-4 py-2 rounded-full bg-red-600 text-white">
                Semua Menu
            </button>
            <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">
                Makanan
            </button>
            <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">
                Minuman
            </button>
            <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">
                Snack
            </button>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($menus as $menu)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ Storage::url($menu->image) }}" 
                         alt="{{ $menu->name }}"
                         class="w-full h-48 object-cover">
                    
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $menu->name }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $menu->description }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </span>
                            <button onclick="addToCart({{ $menu->id }})" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                + Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
        function addToCart(menuId) {
            // Using Livewire emit to add item to cart
            Livewire.emit('addToCart', menuId);
            
            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
            notification.textContent = 'Menu ditambahkan ke keranjang';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
    @endpush
</x-app-layout> 