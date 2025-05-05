<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminOrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct(protected AdminOrderService $adminOrderService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $orders = $this->adminOrderService->getAll($request->query('status'));

        return response()->json([
            'message_en' => 'Orders retrieved successfully.',
            'message_ar' => 'تم جلب الطلبات بنجاح.',
            'data' => $orders,
        ]);
    }

    public function updateStatus(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'status' => 'required|in:new,processing,completed,cancelled,refunded',
        ]);

        $order = $this->adminOrderService->updateStatus($id, $request->status);

        return response()->json([
            'message_en' => 'Order status updated.',
            'message_ar' => 'تم تحديث حالة الطلب.',
            'data' => $order,
        ]);
    }
}
