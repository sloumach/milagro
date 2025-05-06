<?php
namespace App\Services;

use App\Models\Order;

class AdminOrderService
{
    public function getAll(?string $status = null)
    {
        $query = Order::with(['user', 'orderItems.product']);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->latest()->get();
    }

    public function updateStatus(int $id, string $status): Order
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        return $order->load(['user', 'orderItems.product']);
    }

    public function updatePaymentStatus(int $id, string $status): Order
    {
        $order = Order::findOrFail($id);
        $order->payment_status = $status;
        $order->save();

        return $order->load(['user', 'orderItems']);
    }
}
