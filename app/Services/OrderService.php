<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(array $data, User $user): Order
    {
        return DB::transaction(function () use ($data, $user) {
            $total = 0;

            // Calcul des totaux
            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                $total += $product->price * $item['quantity'];
            }

            $discount = $data['discount_amount'] ?? 0;
            $final = $total - $discount;

            // Création de la commande
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $total,
                'discount_amount' => $discount,
                'final_amount' => $final,
                'payment_method' => $data['payment_method'] ?? 'cash_on_delivery',
                'payment_status' => 'pending',
                'payment_reference' => $data['payment_reference'] ?? null,
                'delivery_address' => $data['delivery_address'],
                'status' => 'new',
            ]);

            // Création des order_items
            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name_en,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $product->price * $item['quantity'],
                ]);
            }

            return $order->load('orderItems');
        });
    }
}
