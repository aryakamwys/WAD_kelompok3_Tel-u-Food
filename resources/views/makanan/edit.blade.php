<x-app-layout>
    @slot('title', 'Edit Makanan')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Makanan') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card>
            <x-card.header>
                <x-card.title>{{ __('Edit Makanan') }}</x-card.title>
                <x-card.description>{{ __('Edit informasi makanan') }}</x-card.description>
            </x-card.header>

            <x-card.content>
                <form action="{{ route('makanan.update', $makanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nama" :value="__('Nama Makanan')" />
                        <x-text-input id="nama" name="nama" type="text" value="{{ old('nama', $makanan->nama) }}" required />
                        <x-input-error :messages="$errors->get('nama')" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $makanan->deskripsi) }}</x-textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" />
                    </div>

                    <div>
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" name="harga" type="number" value="{{ old('harga', $makanan->harga) }}" required />
                        <x-input-error :messages="$errors->get('harga')" />
                    </div>

                    <div>
                        <x-input-label for="gambar" :value="__('Gambar')" />
                        <input id="gambar" name="gambar" type="file" />
                        <x-input-error :messages="$errors->get('gambar')" />
                    </div>

                    <x-primary-button class="mt-4">Update</x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
