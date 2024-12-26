<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pesanan Saya</h2>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse($orders as $order)
                    <div class="border-b last:border-b-0">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Order #{{ $order->order_number }}
                                    </h3>
                                    <p class="text-sm text-gray-600">
                                        {{ $order->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                                <div>
                                    <span class="px-3 py-1 rounded-full text-sm 
                                        @if($order->status == 'paid') bg-green-200 text-green-900
                                        @elseif($order->status == 'cancelled') bg-red-200 text-red-900
                                        @else bg-yellow-200 text-yellow-900 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                @foreach($order->items as $item)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">
                                            {{ $item->quantity }}x {{ $item->menu_name }}
                                        </span>
                                        <span class="text-gray-900">
                                            Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-4 flex justify-between items-center pt-4 border-t">
                                <span class="font-semibold text-gray-900">Total</span>
                                <span class="font-bold text-lg text-gray-900">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('orders.show', $order) }}" 
                                   class="text-red-600 hover:text-red-800">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-500">
                        Belum ada pesanan
                    </div>
                @endforelse

                <div class="px-6 py-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 