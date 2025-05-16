<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function index(int $productId): JsonResponse
    {
        $reviews = Review::where('product_id', $productId)
            ->where('approved', true)
            ->latest()
            ->with('user:id,name')
            ->get();

        return response()->json([
            'data' => ReviewResource::collection($reviews)
        ]);
    }

    public function store(StoreReviewRequest $request, int $productId): JsonResponse
    {
        $product = Product::findOrFail($productId);

        $review = Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'approved'   => false,
        ]);

        return response()->json([
            'message_en' => 'Review submitted successfully and is pending approval.',
            'message_ar' => 'تم إرسال التقييم بنجاح وهو قيد المراجعة.',
            'data' => new ReviewResource($review)
        ], 201);
    }
}
