<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

class AdminReviewController extends Controller
{
    public function index(): JsonResponse
    {
        $reviews = Review::with(['user', 'product'])->latest()->get();

        return response()->json([
            'data' => $reviews
        ]);
    }

    public function approve(Review $review): JsonResponse
    {
        $review->update(['approved' => true]);

        return response()->json([
            'message_en' => 'Review approved successfully.',
            'message_ar' => 'تمت الموافقة على التقييم بنجاح.'
        ]);
    }

    public function destroy(Review $review): JsonResponse
    {
        $review->delete();

        return response()->json([
            'message_en' => 'Review deleted successfully.',
            'message_ar' => 'تم حذف التقييم بنجاح.'
        ]);
    }
}

