<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\MyFatoorahService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentController extends Controller
{
    public function __construct(
        protected MyFatoorahService $myFatoorahService,
        protected OrderService $orderService
    ) {}

    public function initiate(Request $request)
    {
        $user = Auth::user();

        // ✅ Validation des données d’entrée
        $data = $request->validate([
            'delivery_address'   => 'required|string|max:255',
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
            'coupon_code'        => 'nullable|string|exists:coupons,code',
        ]);

        $data['payment_method'] = 'myfatoorah';

        // ✅ Création de la commande dans la base
        $order = $this->orderService->createOrder($data, $user);

        // ✅ Création de la facture MyFatoorah
        $payload = [
            'CustomerName'       => $user->name,
            'CustomerEmail'      => $user->email,
            'InvoiceValue'       => $order->final_amount,
            'NotificationOption' => 'LNK',
            'DisplayCurrencyIso' => 'KWD', // ou TND si accepté
            'CallBackUrl'        => route('payment.callback', $order->id),
            'ErrorUrl'           => route('payment.failed', $order->id),
        ];

        try {
            $payment = $this->myFatoorahService->createInvoice($payload);

            // ✅ Enregistrer la référence
            $order->update([
                'payment_reference' => $payment['invoiceId']
            ]);

            return redirect($payment['invoiceURL']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'MyFatoorah error: ' . $e->getMessage()], 500);
        }
    }

    public function callback(Request $request, Order $order)
    {
        try {
            $paymentId = $request->query('paymentId');
            $data = $this->myFatoorahService->getPaymentStatus($paymentId);
            if ($data->InvoiceStatus === 'Paid') {
                $order->update([
                    'payment_status' => 'paid',
                    'payment_reference' => $data->invoiceId,
                    'status' => 'processing',
                ]);
                foreach ($order->orderItems as $item) {
                    $item->product->decrement('quantity', $item->quantity);
                }
                return response()->json(['message' => 'Payment successful.'], 200);
            } else {
                $order->update(['payment_status' => 'failed', 'status' => 'cancelled']);
                return response()->json(['message' => 'Payment failed.'], 400);
            }


        } catch (\Exception $e) {
            return response()->json(['error' => 'Callback error: ' . $e->getMessage()], 500);
        }
    }

    public function failed(Order $order)
    {
        $order->update(['payment_status' => 'failed','status' => 'cancelled',]);
        return response()->json(['message' => 'Payment failed.'], 400);
    }
}

