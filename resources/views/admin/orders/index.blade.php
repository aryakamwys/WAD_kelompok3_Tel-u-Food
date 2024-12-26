<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pesanan</h2>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($orders as $order)
                    <div class="border-b last:border-b-0">
                        <div class="p-6 flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Order #{{ $order->order_number }}</h3>
                                <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm 
                                @if($order->status == 'paid') bg-green-200 text-green-900
                                @elseif($order->status == 'cancelled') bg-red-200 text-red-900
                                @else bg-yellow-200 text-yellow-900 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach

                <div class="px-6 py-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 