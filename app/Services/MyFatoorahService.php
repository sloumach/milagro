<?php
namespace App\Services;

use MyFatoorah\Library\MyFatoorah;

class MyFatoorahService
{
    protected $mfObj;

    public function __construct()
    {
        $this->mfObj = new MyFatoorah(env('MYFATOORAH_API_KEY'), env('MYFATOORAH_IS_LIVE') === 'true');
    }

    public function createInvoice($data)
    {
        return $this->mfObj->sendPayment($data);
    }

    public function getPaymentStatus($paymentId)
    {
        return $this->mfObj->getPaymentStatus(['Key' => $paymentId, 'KeyType' => 'PaymentId']);
    }
}
