<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Tel-U Food">
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-red-600 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <!-- Add more navigation links -->
                </div>
            </div>
            
            <!-- User Menu -->
            @auth
                <div class="flex items-center">
                    <x-dropdown>
                        <!-- User dropdown content -->
                    </x-dropdown>
                </div>
            @endauth
        </div>
    </div>
</nav> 