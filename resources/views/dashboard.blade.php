<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Contoh Kartu 1 -->
                <x-card 
                    :image="'https://via.placeholder.com/150'"
                    :title="'Produk 1'"
                    :description="'Tampilan product 1'"
                    :price="'Rp.1000'" 
                />
                <!-- Contoh Kartu 2 -->
                <x-card 
                    :image="'https://via.placeholder.com/150'"
                    :title="'Produk 2'"
                    :description="'Tampilan product 2'"
                    :price="'Rp.1000'" 
                />
                <!-- Contoh Kartu 3 -->
                <x-card 
                    :image="'https://via.placeholder.com/150'"
                    :title="'Produk 3'"
                    :description="'Tampilan product 1'"
                    :price="'Rp.1000'" 
                />
            </div>
        </div>
    </div>
</x-app-layout>
