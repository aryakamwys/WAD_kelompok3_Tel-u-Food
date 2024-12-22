<div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
    <img src="{{ $image }}" alt="Product image" class="w-full h-48 object-cover rounded-lg">
    
    <div class="mt-4">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $title }}</h3>
        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $description }}</p>
        <div class="flex justify-between items-center mt-4">
            <span class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $price }}</span>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-200">
                Add to Cart
            </button>
        </div>
    </div>
</div>
