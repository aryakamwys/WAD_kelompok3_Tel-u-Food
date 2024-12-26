<div class="bg-white p-6 rounded-lg shadow-lg">
    <h3 class="text-lg font-semibold mb-4">Informasi Pembayaran</h3>
    
    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <!-- Customer Information -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="full_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Payment Method Selection -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="bca">BCA Virtual Account</option>
                    <option value="mandiri">Mandiri Virtual Account</option>
                    <option value="gopay">GoPay</option>
                </select>
            </div>

            <!-- Order Summary -->
            <div class="border-t pt-4">
                <div class="flex justify-between">
                    <span>Total Pembayaran</span>
                    <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">
                Bayar Sekarang
            </button>
        </div>
    </form>
</div> 