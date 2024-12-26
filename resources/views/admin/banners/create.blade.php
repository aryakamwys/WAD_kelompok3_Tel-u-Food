<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Banner Baru</h2>

                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Banner</label>
                            <input type="text" name="title" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar Banner</label>
                            <input type="file" name="image" 
                                   class="mt-1 block w-full" 
                                   required>
                            <p class="mt-1 text-sm text-gray-500">
                                Ukuran yang disarankan: 1200x400 pixels
                            </p>
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" 
                                       class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">Aktifkan Banner</span>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Simpan Banner
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 