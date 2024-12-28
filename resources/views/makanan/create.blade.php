<x-app-layout>

    @slot('title', 'Tambah Makanan')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Makanan') }}
        </h2>
    </x-slot>

    <x-container>

        <x-card>
            <x-card.header>
                <x-card.title>{{ __('Tambah Makanan') }}</x-card.title>
            </x-card.header>

            <x-card.content>

                <form action="{{ route('makanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="nama" :value="__('Nama Makanan')" />
                        <x-text-input id="nama" name="nama" value="{{ old('nama') }}" required />
                        <x-input-error :messages="$errors->get('nama')" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</x-textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" />
                    </div>

                    <div>
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" name="harga" type="number" value="{{ old('harga') }}" required />
                        <x-input-error :messages="$errors->get('harga')" />
                    </div>

                    <div>
                        <x-input-label for="gambar" :value="__('Gambar')" />
                        <input id="gambar" name="gambar" type="file" />
                        <x-input-error :messages="$errors->get('gambar')" />
                    </div>

                    <x-primary-button class="mt-4">
                        Simpan
                    </x-primary-button>
                </form>

            </x-card.content>
        </x-card>

    </x-container>

</x-app-layout>
