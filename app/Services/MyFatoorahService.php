<?php
namespace App\Services;

use MyFatoorah\Library\API\Payment\MyFatoorahPayment;
use MyFatoorah\Library\API\Payment\MyFatoorahPaymentStatus;

class MyFatoorahService
{
    protected array $config;

    public function __construct()
    {
        $this->config = [
            'apiKey' => config('services.myfatoorah.apiKey'),
            'isTest' => config('services.myfatoorah.isTest', true),
            'vcCode' => 'KWT',
        ];
    }

    public function createInvoice(array $payload, int $paymentMethodId = 0, $orderId = null, $sessionId = null): array
    {
        $mf = new MyFatoorahPayment($this->config);
        return $mf->getInvoiceURL($payload, $paymentMethodId, $orderId, $sessionId);
    }

    public function getPaymentStatus(string $paymentId): object
    {
        $mf = new MyFatoorahPaymentStatus($this->config);
        return $mf->getPaymentStatus($paymentId, 'PaymentId');
    }
}

