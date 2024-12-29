<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <x-container>
            <!-- Header & Search Section -->
            <div class="mb-12">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Jelajahi Menu</h1>
                    <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai macam hidangan dan minuman dari restoran terbaik</p>
                </div>

                <form action="{{ route('menus.explore') }}" method="GET" class="max-w-3xl mx-auto">
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <div class="flex-grow">
                            <div class="flex items-center bg-white rounded-lg shadow-md overflow-hidden">
                                <input type="text" name="search" placeholder="Cari menu..." value="{{ request('search') }}"
                                    class="w-full px-4 py-3 text-gray-700 focus:outline-none">

                                <select name="category" class="border-l px-4 py-3 text-gray-700 bg-white focus:outline-none">
                                    <option value="">Semua Kategori</option>
                                    <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Makanan</option>
                                    <option value="Beverage" {{ request('category') == 'Beverage' ? 'selected' : '' }}>Minuman</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-blue-100 text-blue-700 px-6 py-3 rounded-lg hover:bg-blue-200 transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Price Filter Section -->
            <div class="max-w-3xl mx-auto mb-12">
                <form action="{{ route('menus.explore') }}" method="GET" class="grid md:grid-cols-3 gap-4">
                    <input type="number" name="min_price" placeholder="Harga Minimum" value="{{ request('min_price') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="number" name="max_price" placeholder="Harga Maksimum" value="{{ request('max_price') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="flex space-x-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out group">
                            Filter
                        </button>
                        <a href="{{ route('menus.explore') }}"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out group">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($menus as $menu)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition hover:scale-105 hover:shadow-xl">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ Storage::url('menus/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{ $menu->name }}</h3>
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                    {{ $menu->category->name }}
                                </span>
                            </div>

                            @if ($menu->description)
                                <p class="text-gray-600 text-sm mb-2 line-clamp-2">
                                    {{ $menu->description }}
                                </p>
                            @endif

                            <div class="flex justify-between items-center">
                                <span class="text-red-500 font-bold text-lg">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </span>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                    </svg>
                                    {{ Str::limit($menu->restaurant->name, 15) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <img src="{{ asset('images/no-results.jpg') }}" alt="No Results" class="mx-auto mb-6 w-64 h-64">
                        <h2 class="text-2xl font-semibold text-gray-700">Tidak ada menu yang ditemukan</h2>
                        <p class="text-gray-500 mt-2">Coba ubah kata kunci pencarian atau filter Anda</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $menus->appends(request()->input())->links() }}
            </div>
        </x-container>
    </div>
</x-app-layout>
