<x-app-layout>
    @slot('title', 'Daftar Makanan')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Makanan') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.header>
                <x-card.title>{{ __('Makanan') }}</x-card.title>
                <x-card.description>
                    <a href="{{ route('makanan.create') }}">
                        <x-primary-button class="text-blue-600">Tambah Makanan</x-primary-button>
                    </a>
                </x-card.description>
            </x-card.header>

            <x-card.content>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($makanans as $makanan)
                    <div class="border p-4">
                        <h3 class="text-xl">{{ $makanan->nama }}</h3>
                        <p>{{ $makanan->deskripsi }}</p>
                        <p>Harga: Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                        <img src="{{ asset('storage/' . $makanan->gambar) }}" alt="{{ $makanan->nama }}" class="w-32 h-32 object-cover rounded">
                        <div class="mt-2 flex space-x-4"> <!-- Perubahan di sini -->
                            <!-- Edit Button -->
                            <a href="{{ route('makanan.edit', $makanan->id) }}">
                                <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white mr-2"> <!-- Tambahkan mr-2 di sini -->
                                    Edit
                                </x-primary-button>
                            </a>
                            
                            <!-- Hapus Button -->
                            <form action="{{ route('makanan.destroy', $makanan->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
