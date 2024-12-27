<x-app-layout>

    @slot('title', 'Create a restauran')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a restaurant') }}
        </h2>
    </x-slot>

    <x-container>

        <x-card class="max-w-2xl" >
            <x-card.header>

                <x-card.title>
                    Create a restaurant
                </x-card.title>
                <x-card.description>

                    Fill the form below to create a restaurant

                </x-card.description>

            </x-card.header>

            <x-card.content>

                Tempat makan sekitar telkom

            </x-card.content>

        </x-card>

    </x-container>

</x-app-layout>
