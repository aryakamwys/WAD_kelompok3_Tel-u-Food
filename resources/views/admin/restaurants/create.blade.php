<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Restoran Baru</h2>

                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Restoran</label>
                            <input type="text" name="name" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="address" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                      required></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto Restoran</label>
                            <input type="file" name="image" 
                                   class="mt-1 block w-full" 
                                   required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Simpan Restoran
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 