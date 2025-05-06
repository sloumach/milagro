<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function __construct(protected CartService $cartService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $cart = $this->cartService->getCart($request->user());

        return response()->json([
            'message_en' => 'Cart fetched successfully.',
            'message_ar' => 'تم جلب سلة المشتريات بنجاح.',
            'data' => $cart,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->cartService->addToCart(
            $request->user(),
            $request->input('product_id'),
            $request->input('quantity')
        );

        return response()->json([
            'message_en' => 'Product added to cart.',
            'message_ar' => 'تمت إضافة المنتج إلى السلة.',
            'data' => $cart,
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->cartService->updateQuantity(
            $request->user(),
            $request->input('product_id'),
            $request->input('quantity')
        );

        return response()->json([
            'message_en' => 'Cart item updated.',
            'message_ar' => 'تم تعديل كمية المنتج في السلة.',
            'data' => $cart,
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cart = $this->cartService->removeFromCart(
            $request->user(),
            $request->input('product_id')
        );

        return response()->json([
            'message_en' => 'Product removed from cart.',
            'message_ar' => 'تم إزالة المنتج من السلة.',
            'data' => $cart,
        ]);
    }

    public function clear(Request $request): JsonResponse
    {
        $this->cartService->clearCart($request->user());

        return response()->json([
            'message_en' => 'Cart cleared.',
            'message_ar' => 'تم إفراغ السلة.',
        ]);
    }
}
