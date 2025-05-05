<?php
namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;

class CartService
{
    public function getOrCreateCart(User $user): Cart
    {
        return $user->cart()->firstOrCreate([]);
    }

    public function addToCart(User $user, int $productId, int $quantity): Cart
    {
        $cart = $this->getOrCreateCart($user);
        $item = $cart->items()->where('product_id', $productId)->first();

        if ($item) {
            $item->quantity += $quantity;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return $cart->load('items.product');
    }

    public function updateQuantity(User $user, int $productId, int $quantity): Cart
    {
        $cart = $this->getOrCreateCart($user);
        $item = $cart->items()->where('product_id', $productId)->firstOrFail();
        $item->quantity = $quantity;
        $item->save();

        return $cart->load('items.product');
    }

    public function removeFromCart(User $user, int $productId): Cart
    {
        $cart = $this->getOrCreateCart($user);
        $cart->items()->where('product_id', $productId)->delete();

        return $cart->load('items.product');
    }

    public function clearCart(User $user): void
    {
        $cart = $this->getOrCreateCart($user);
        $cart->items()->delete();
    }

    public function getCart(User $user): Cart
    {
        return $this->getOrCreateCart($user)->load('items.product');
    }
}
