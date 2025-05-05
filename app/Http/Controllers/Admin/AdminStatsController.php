<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Services\StatsService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminStatsController extends Controller
{
    public function __construct(protected StatsService $statsService)
    {
    }

    public function daily(): JsonResponse
    {
        $data = $this->statsService->dailySales();
        return response()->json([
            'message_en' => 'Daily sales stats.',
            'message_ar' => 'إحصائيات المبيعات اليومية.',
            'data' => $data,
        ]);
    }

    public function monthly(): JsonResponse
    {
        $data = $this->statsService->monthlySales();
        return response()->json([
            'message_en' => 'Monthly sales stats.',
            'message_ar' => 'إحصائيات المبيعات الشهرية.',
            'data' => $data,
        ]);
    }

    public function topProducts(): JsonResponse
    {
        $data = $this->statsService->topProducts();
        return response()->json([
            'message_en' => 'Top selling products.',
            'message_ar' => 'المنتجات الأكثر مبيعاً.',
            'data' => $data,
        ]);
    }

    public function export(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $filename = 'orders_export_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new OrdersExport($from, $to), $filename);
    }

}
