<?php
namespace App\Services;

use MyFatoorah\Library\MyFatoorah;

class MyFatoorahService
{
    protected MyFatoorah $mf;

    public function __construct()
    {


    }

    public function initiatePayment(array $payload): array
    {
        $mf = new MyFatoorah([
            'apiKey'  => config('services.myfatoorah.apiKey'),
            'isTest'  => config('services.myfatoorah.isTest'),
            'vcCode' => 'KWT',

        ]);
        return $mf->initiatePayments($payload,0);
    }

    public function getStatus(string $paymentId): array
    {
        return $this->mf->getPaymentStatus([
            'Key' => $paymentId,
            'KeyType' => 'PaymentId'
        ]);
    }
}
