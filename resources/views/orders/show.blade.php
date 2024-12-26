<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Order Header -->
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Order #{{ $order->order_number }}
                            </h2>
                            <p class="text-gray-600">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            @if($order->status == 'paid') bg-green-100 text-green-800
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <!-- Customer Info -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengiriman</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nama Penerima</p>
                                <p class="text-gray-900">{{ $order->customer_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nomor Telepon</p>
                                <p class="text-gray-900">{{ $order->customer_phone }}</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-sm font-medium text-gray-500">Alamat Pengiriman</p>
                                <p class="text-gray-900">{{ $order->customer_address }}</p>
                            </div>
                            @if($order->notes)
                                <div class="col-span-2">
                                    <p class="text-sm font-medium text-gray-500">Catatan</p>
                                    <p class="text-gray-900">{{ $order->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Pesanan</h3>
                        <div class="border rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Menu</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Harga</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $item->menu_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                                Rp {{ number_format($item->price, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-sm font-medium text-gray-900 text-right">
                                            Total
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">
                                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Actions -->
                    @if($order->status == 'pending')
                        <div class="flex justify-end">
                            <button id="pay-button" 
                                    class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                                Bayar Sekarang
                            </button>
                        </div>

                        @push('scripts')
                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
                                data-client-key="{{ config('services.midtrans.client_key') }}"></script>
                        <script>
                            const payButton = document.querySelector('#pay-button');
                            payButton.addEventListener('click', function(e) {
                                e.preventDefault();
                                window.snap.pay('{{ $order->snap_token }}');
                            });
                        </script>
                        @endpush
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 