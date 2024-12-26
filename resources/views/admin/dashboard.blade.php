<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-xl rounded-lg p-6">
                    <div class="text-xl font-semibold text-gray-700">Total Restoran</div>
                    <div class="text-3xl font-bold text-red-600">{{ $restaurantCount }}</div>
                </div>
                <!-- Tambahkan card statistik lainnya -->
            </div>

            <!-- Quick Actions -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Aksi Cepat</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.restaurants.create') }}" 
                       class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center">
                        Tambah Restoran
                    </a>
                    <!-- Tambahkan quick actions lainnya -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 