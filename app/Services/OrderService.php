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

            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                $total += $product->price * $item['quantity'];
            }

            // 🔁 Vérification du coupon
            $coupon = $this->validateCoupon($data['coupon_code'] ?? null);
            $discount = 0;

            if ($coupon) {
                $discount = $coupon->type === 'percentage'
                    ? ($total * $coupon->discount_value / 100)
                    : $coupon->discount_value;

                $coupon->increment('used_count');
            }

            $final = max(0, $total - $discount);

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
