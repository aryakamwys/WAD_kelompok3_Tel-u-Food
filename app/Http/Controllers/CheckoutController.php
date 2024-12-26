<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function process(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . time(),
            'total_amount' => $this->calculateTotal($cart),
            'status' => 'pending',
            'customer_name' => $request->recipient_name,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
            'notes' => $request->notes,
        ]);

        // Create order items
        foreach ($cart as $id => $item) {
            $order->items()->create([
                'menu_id' => $id,
                'menu_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        try {
            $snapToken = $this->midtransService->createTransaction($order);
            
            // Clear cart after successful order creation
            session()->forget('cart');
            
            return view('checkout.payment', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembayaran');
        }
    }

    private function calculateTotal($cart)
    {
        return collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }
} 