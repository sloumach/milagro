<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\MyFatoorahService;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class UserPaymentController extends Controller
{
    public function __construct(
        protected MyFatoorahService $myFatoorah,
        protected OrderService $orderService
    ) {}

    public function initiate(Request $request)
    {
        $user = Auth::user();

        // 1. Créer la commande via OrderService (avec coupon si fourni)
        $data = $request->validate([
            'delivery_address' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|exists:coupons,code',
        ]);

        $data['payment_method'] = 'myfatoorah';

        $order = $this->orderService->createOrder($data, $user);

        // 2. Rediriger vers MyFatoorah avec les bons montants
        $payload = [
            'CustomerName'       => $user->name,
            'CustomerEmail'      => $user->email,
            'InvoiceValue'       => $order->final_amount,
            'DisplayCurrencyIso' => 'KWT',
            'CallBackUrl'        => route('payment.callback', $order->id),
            'ErrorUrl'           => route('payment.failed', $order->id),
        ];

        $response = $this->myFatoorah->initiatePayment($payload);

        // 3. Sauvegarder la référence pour le suivi
        $order->update([
            'payment_reference' => $response['InvoiceId'], // ou InvoiceURL si tu préfères
        ]);

        return redirect($response['InvoiceURL']);
    }

    public function callback(Request $request, Order $order)
    {
        $paymentId = $request->query('paymentId');

        $status = $this->myFatoorah->getStatus($paymentId);

        if ($status['InvoiceStatus'] === 'Paid') {
            $order->update([
                'payment_status' => 'paid',
                'payment_reference' => $paymentId,
                'status' => 'processing',
            ]);

            return view('payment.success', compact('status', 'order'));
        }

        return view('payment.failed', compact('status', 'order'));
    }

    public function failed(Order $order)
    {
        return view('payment.failed', compact('order'));
    }
}

