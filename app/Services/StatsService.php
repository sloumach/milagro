<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatsService
{
    public function dailySales(int $days = 30): array
    {
        return Order::select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("SUM(final_amount) as total_sales")
            )
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy(DB::raw("DATE(created_at)"))
            ->orderBy('date', 'asc')
            ->get()
            ->toArray();
    }

    public function monthlySales(int $months = 12): array
    {
        return Order::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                DB::raw("SUM(final_amount) as total_sales")
            )
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subMonths($months))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();
    }

    public function topProducts(int $limit = 10): array
    {
        return DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name_en',
                'products.name_ar',
                DB::raw('SUM(order_items.quantity) as total_quantity'),
                DB::raw('SUM(order_items.total) as total_revenue')
            )
            ->groupBy('products.id', 'products.name_en', 'products.name_ar')
            ->orderByDesc('total_quantity')
            ->limit($limit)
            ->get()
            ->toArray();
    }

}
