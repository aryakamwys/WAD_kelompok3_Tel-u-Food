<x-app-layout>

    @slot('title', 'Edit Restaurant')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <x-container>

        <x-card >
    <x-card.header>

                <x-card.title>
                    edit restaurant
                </x-card.title>
                <x-card.description>

                    edit the {{ $store->name }}

                </x-card.description>

            </x-card.header>

            <x-card.content>

                <form action="{{ route('stores.update', $store) }}" method="post" enctype="multipart/form-data" class="[&>div]:mb-6" novalidate>

                    @method('put')
                
                    @csrf

                    <div>
                        <x-input-label for="logo" class="sr-only" :value="__('Logo')" />
                        <input id="logo" name="logo" type="file" />
                        <x-input-error :messages="$errors->get('logo')" required/>
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $store->name)" required/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description', $store->description) }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">

                        Update

                    </x-primary-button>
                
                </form>

            </x-card.content>

        </x-card>

    </x-container>

</x-app-layout>
