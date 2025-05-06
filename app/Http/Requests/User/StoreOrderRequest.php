<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // middleware auth déjà en place
    }

    public function rules(): array
    {
        return [
            'delivery_address' => 'required|string|max:1000',
            'discount_amount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|in:cash_on_delivery,myfatoorah',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }
}
