<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{
    protected $from;
    protected $to;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $query = Order::with('user')
            ->where('payment_status', 'paid');

        if ($this->from) {
            $query->whereDate('created_at', '>=', $this->from);
        }

        if ($this->to) {
            $query->whereDate('created_at', '<=', $this->to);
        }

        return view('exports.orders', [
            'orders' => $query->get()
        ]);
    }
}
