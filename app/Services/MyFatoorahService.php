<?php
namespace App\Services\Payment;

use MyFatoorah\Library\MyFatoorah;

class MyFatoorahService
{
    protected MyFatoorah $mf;

    public function __construct()
    {
        $this->mf = new MyFatoorah(
            config('services.myfatoorah.api_key'),
            config('services.myfatoorah.is_live')
        );
    }

    public function initiatePayment(array $payload): array
    {
        return $this->mf->sendPayment($payload);
    }

    public function getStatus(string $paymentId): array
    {
        return $this->mf->getPaymentStatus([
            'Key' => $paymentId,
            'KeyType' => 'PaymentId'
        ]);
    }
}
