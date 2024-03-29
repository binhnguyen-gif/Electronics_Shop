<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|string',
            'discount' => 'required',
            'limit_number' => 'required',
            'payment_limit' => 'required',
            'expiration_date' => 'required|date',
            'description' => 'required|string',
            'status' => 'required'
        ];
    }
}
