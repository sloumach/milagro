<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCouponRequest;
use App\Http\Requests\Admin\UpdateCouponRequest;
use App\Services\CouponService;
use Illuminate\Http\JsonResponse;

class AdminCouponController extends Controller
{
    public function __construct(protected CouponService $couponService)
    {
    }

    public function index(): JsonResponse
    {
        $coupons = $this->couponService->getAll();
        return response()->json(['data' => $coupons]);
    }

    public function show(int $id): JsonResponse
    {
        $coupon = $this->couponService->find($id);
        return response()->json(['data' => $coupon]);
    }

    public function store(StoreCouponRequest $request): JsonResponse
    {
        $coupon = $this->couponService->create($request->validated());
        return response()->json([
            'message_en' => 'Coupon created successfully.',
            'message_ar' => 'تم إنشاء الكوبون بنجاح.',
            'data' => $coupon,
        ], 201);
    }

    public function update(UpdateCouponRequest $request, int $id): JsonResponse
    {
        $coupon = $this->couponService->update($id, $request->validated());
        return response()->json([
            'message_en' => 'Coupon updated successfully.',
            'message_ar' => 'تم تحديث الكوبون بنجاح.',
            'data' => $coupon,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->couponService->delete($id);
        return response()->json([
            'message_en' => 'Coupon deleted.',
            'message_ar' => 'تم حذف الكوبون.',
        ]);
    }
}
