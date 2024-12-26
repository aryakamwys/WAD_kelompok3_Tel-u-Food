<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Keranjang Belanja</h2>

                @if(count($cartItems) > 0)
                    <div class="space-y-4">
                        @foreach($cartItems as $id => $item)
                            <div class="flex items-center justify-between border-b pb-4">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ Storage::url($item['image']) }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="w-20 h-20 object-cover rounded">
                                    
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $item['name'] }}</h3>
                                        <p class="text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center border rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-red-600"
                                                wire:click="decrementQuantity({{ $id }})">
                                            -
                                        </button>
                                        <span class="px-3 py-1 border-x">{{ $item['quantity'] }}</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-red-600"
                                                wire:click="incrementQuantity({{ $id }})">
                                            +
                                        </button>
                                    </div>

                                    <button class="text-red-600 hover:text-red-800"
                                            wire:click="removeItem({{ $id }})">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <!-- Summary -->
                        <div class="mt-8 border-t pt-6">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('checkout') }}" 
                                   class="block w-full bg-red-600 text-white text-center py-3 rounded-lg hover:bg-red-700">
                                    Lanjut ke Pembayaran
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p class="text-gray-600">Keranjang belanja Anda kosong</p>
                        <a href="{{ route('dashboard') }}" 
                           class="mt-4 inline-block text-red-600 hover:text-red-800">
                            Mulai Belanja
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 