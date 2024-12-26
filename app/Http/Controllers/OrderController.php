<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }

    public function notification(Request $request)
    {
        $payload = $request->all();
        $orderId = $payload['order_id'];
        $transactionStatus = $payload['transaction_status'];
        $order = Order::where('order_number', $orderId)->firstOrFail();

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $order->update(['status' => 'paid']);
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $order->update(['status' => 'cancelled']);
        }

        return response()->json(['status' => 'success']);
    }
} 