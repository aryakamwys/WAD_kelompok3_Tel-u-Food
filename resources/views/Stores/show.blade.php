<!-- resources/views/stores/show.blade.php -->
<x-app-layout>
    @slot('title', 'Detail Store')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.header>
                <x-card.title>{{ $store->name }}</x-card.title>
                <x-card.description>{{ $store->description }}</x-card.description>
            </x-card.header>

            <x-card.content>
                <div class="mb-4">
                    <a href="{{ route('stores.makanan.create', $store) }}" class="underline text-blue-600">
                        Tambah Makanan
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    @foreach ($store->makanan as $makanan)
                    <x-card class="p-4">
                        <h3>{{ $makanan->nama }}</h3>
                        <p>{{ $makanan->deskripsi }}</p>
                        <p>Harga: Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                    </x-card>
                    @endforeach
                </div>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
