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

            // Vérification du stock (sans décrémenter)
            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->quantity < $item['quantity']) {
                    throw new \Exception("Not enough stock for product: {$product->name_en}");
                }

                $total += $product->price * $item['quantity'];
            }

            $discount = $data['discount_amount'] ?? 0;
            $final = $total - $discount;

            // Création de la commande
            $order = Order::create([
                'user_id'          => $user->id,
                'total_amount'     => $total,
                'discount_amount'  => $discount,
                'final_amount'     => $final,
                'payment_method'   => $data['payment_method'],
                'payment_status'   => 'pending',
                'delivery_address' => $data['delivery_address'],
                'status'           => 'new',
            ]);

            // Création des order_items
            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $product->id,
                    'product_name' => $product->name_en,
                    'quantity'     => $item['quantity'],
                    'price'        => $product->price,
                    'total'        => $product->price * $item['quantity'],
                ]);
            }

            // Si paiement à la livraison : décrémenter le stock maintenant
            if ($data['payment_method'] === 'cash_on_delivery') {
                foreach ($order->orderItems as $item) {
                    $item->product->decrement('quantity', $item->quantity);
                }
            }

            return $order->load('orderItems');
        });
    }


    private function validateCoupon(?string $code): ?Coupon
    {
        if (!$code) return null;

        $coupon = Coupon::where('code', $code)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('valid_from')->orWhere('valid_from', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('valid_to')->orWhere('valid_to', '>=', now());
            })
            ->first();

        if (!$coupon || ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit)) {
            throw new \Exception(__('Invalid or expired coupon code.'));
        }

        return $coupon;
    }
}
