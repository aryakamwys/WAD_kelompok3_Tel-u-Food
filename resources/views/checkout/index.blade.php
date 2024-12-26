<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Checkout</h2>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Delivery Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengiriman</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Penerima</label>
                                    <input type="text" name="recipient_name" 
                                           value="{{ auth()->user()->name }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                    <input type="tel" name="phone" 
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                                    <textarea name="address" rows="3" 
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                              required></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Catatan (opsional)</label>
                                    <textarea name="notes" rows="2" 
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Ringkasan Pesanan</h3>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="space-y-3">
                                    @foreach($cartItems as $item)
                                        <div class="flex justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $item['name'] }} x {{ $item['quantity'] }}
                                                </p>
                                            </div>
                                            <p class="text-sm text-gray-600">
                                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="border-t mt-4 pt-4">
                                    <div class="flex justify-between">
                                        <span class="text-base font-medium text-gray-900">Total</span>
                                        <span class="text-base font-medium text-gray-900">
                                            Rp {{ number_format($total, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mt-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Metode Pembayaran</h3>
                                <div class="space-y-3">
                                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                        <input type="radio" name="payment_method" value="midtrans" 
                                               class="h-4 w-4 text-red-600" checked>
                                        <span class="ml-3 text-sm font-medium text-gray-900">
                                            Pembayaran Online (Midtrans)
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" 
                                    class="mt-6 w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700">
                                Bayar Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 