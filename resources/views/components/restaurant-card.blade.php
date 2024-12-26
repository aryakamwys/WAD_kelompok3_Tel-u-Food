@props(['restaurant'])

<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <img src="{{ Storage::url($restaurant->image) }}" 
         alt="{{ $restaurant->name }}" 
         class="w-full h-48 object-cover">
    
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $restaurant->name }}</h3>
        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $restaurant->description }}</p>
        
        <div class="flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ Str::limit($restaurant->address, 30) }}
            </div>
        </div>
        
        <a href="{{ route('restaurants.show', $restaurant) }}" 
           class="mt-4 block w-full text-center bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition-colors">
            Lihat Menu
        </a>
    </div>
</div> 