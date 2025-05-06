<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code'           => 'required|string|max:255|unique:coupons,code,' . $this->route('id'),
            'type'           => 'required|in:fixed,percentage',
            'discount_value' => 'required|numeric|min:0',
            'usage_limit'    => 'nullable|integer|min:1',
            'valid_from'     => 'nullable|date',
            'valid_to'       => 'nullable|date|after_or_equal:valid_from',
            'status'         => 'required|in:active,inactive',
        ];
    }
}
