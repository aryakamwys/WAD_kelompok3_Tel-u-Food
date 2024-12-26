<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pembayaran</h2>

                <div class="text-center">
                    <p class="mb-4">Total Pembayaran:</p>
                    <p class="text-3xl font-bold text-red-600 mb-8">
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </p>

                    <button id="pay-button" 
                            class="bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '{{ route("orders.show", $order) }}';
                },
                onPending: function(result) {
                    window.location.href = '{{ route("orders.show", $order) }}';
                },
                onError: function(result) {
                    alert('Pembayaran gagal!');
                },
                onClose: function() {
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
    @endpush
</x-app-layout> 