<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class AdminProductsController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $products = $this->productService->getAll();

        return response()->json([
            'products' => ProductResource::collection($products),
        ]);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $product = $this->productService->create($request->validated());
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return response()->json([
            'message_en' => 'Product created successfully.',
            'message_ar' => 'تم إنشاء المنتج بنجاح.',
            'product' => $product,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productService->find($id);

        return response()->json([
            'product' => new ProductResource($product),
        ]);
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        $product = $this->productService->update($id, $request->validated());

        return response()->json([
            'message_en' => 'Product updated successfully.',
            'message_ar' => 'تم تحديث المنتج بنجاح.',
            'product' => $product,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->productService->delete($id);

        return response()->json([
            'message_en' => 'Product deleted successfully.',
            'message_ar' => 'تم حذف المنتج بنجاح.',
        ]);
    }
}
