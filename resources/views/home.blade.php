<x-app-layout>
    @slot('title', 'Home')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <!-- Original Content -->
    <div class="py-12">
        <x-container>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    HomePage
                </div>
            </div>
        </x-container>
    </div>

    <!-- Search Section -->
    <div class="bg-gray-100 py-16">
        <x-container>
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Cari Makanan Favorit</h2>
                <p class="mt-4 text-lg text-gray-600">Cari restoran sekitar kampus Telkom Univeristy</p>
                
                <form class="mt-8 flex justify-center">
                    <!-- Input Field -->
                    <input type="text" 
                           class="form-control w-full sm:w-1/2 mr-2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500" 
                           placeholder="Search restoran">
                    
                    <!-- Button -->
                    <button type="submit" 
                            class="btn bg-red-500 hover:bg-red-600 text-black font-medium py-2 px-6 rounded-lg border-2 border-red-500">
                        Cari
                    </button>
                </form>
                
                
            </div>
        </x-container>
    </div>

<!-- Events Section -->
<div class="py-12">
    <x-container>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Even yang akan datang</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/Events1.jpeg') }}" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">Food Festival 2024</h3>
                    <p class="mt-2 text-gray-600">Join us for the biggest food festival at Telkom University</p>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <svg class="mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                        January 15, 2024
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/Events2.jpeg') }}" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">Cooking Workshop</h3>
                    <p class="mt-2 text-gray-600">Learn to cook authentic Indonesian cuisine</p>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <svg class="mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                        February 1, 2024
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/Events2.jpeg') }}" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">Food</h3>
                    <p class="mt-2 text-gray-600">Experience a magical evening of art and live music</p>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <svg class="mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                        March 10, 2024
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</div>

</x-app-layout>
