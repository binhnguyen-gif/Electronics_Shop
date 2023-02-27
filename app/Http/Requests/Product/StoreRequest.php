<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required',
            'category_id'=> 'required',
            'alias'=> 'required',
            'avatar'=> 'required',
            'img'=> 'required',
            'sortDesc'=> 'required',
            'detail'=> 'required',
            'producer_id'=> 'required',
            'number'=> 'required',
            'number_buy'=> 'required',
            'sale'=> 'required',
            'price'=> 'required',
            'price_sale'=> 'required',
            'status'=> 'required',
        ];
    }
}
