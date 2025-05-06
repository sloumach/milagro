<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->validated(), $request->user());

        return response()->json([
            'message_en' => 'Order placed successfully.',
            'message_ar' => 'تم تنفيذ الطلب بنجاح.',
            'data' => new OrderResource($order)
        ], 201);
    }

    public function index(): JsonResponse
    {
        $orders = Auth::user()->orders()->latest()->with('orderItems')->get();

        return response()->json([
            'data' => OrderResource::collection($orders)
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $order = Auth::user()->orders()->with('orderItems')->findOrFail($id);

        return response()->json([
            'data' => new OrderResource($order)
        ]);
    }
}
