<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Menu Image -->
                    <div class="h-96 md:h-full">
                        <img src="{{ Storage::url($menu->image) }}" 
                             alt="{{ $menu->name }}"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Menu Details -->
                    <div class="p-8">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $menu->name }}</h1>
                            <p class="text-gray-600">{{ $menu->description }}</p>
                        </div>

                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Restoran</h2>
                            <a href="{{ route('restaurants.show', $menu->restaurant) }}" 
                               class="text-red-600 hover:text-red-800 flex items-center">
                                <img src="{{ Storage::url($menu->restaurant->image) }}" 
                                     alt="{{ $menu->restaurant->name }}"
                                     class="w-10 h-10 rounded-full object-cover mr-3">
                                {{ $menu->restaurant->name }}
                            </a>
                        </div>

                        <div class="border-t pt-6">
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-2xl font-bold text-gray-900">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex items-center border rounded-lg">
                                    <button class="px-4 py-2 text-gray-600 hover:text-red-600"
                                            onclick="decrementQuantity()">
                                        -
                                    </button>
                                    <span class="px-4 py-2 border-x" id="quantity">1</span>
                                    <button class="px-4 py-2 text-gray-600 hover:text-red-600"
                                            onclick="incrementQuantity()">
                                        +
                                    </button>
                                </div>

                                <button onclick="addToCart()" 
                                        class="flex-1 bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-700">
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let quantity = 1;

        function incrementQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }

        function decrementQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }

        function addToCart() {
            Livewire.emit('addToCart', {{ $menu->id }}, quantity);
            
            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
            notification.textContent = `${quantity} menu ditambahkan ke keranjang`;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
    @endpush
</x-app-layout> 