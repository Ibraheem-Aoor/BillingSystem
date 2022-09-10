<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_service_id' => 'required',
            'quantity' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_service_id.required' => 'Product Required',
            'quantity.required' => 'Quantity Required',
        ];
    }
}
