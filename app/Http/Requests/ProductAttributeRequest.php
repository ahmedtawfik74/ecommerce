<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttributeRequest extends FormRequest
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
            'color.*'       => 'required|min:3|max:20|string',
            'sku.*'         => 'required|min:3|max:20|string|unique:product_attributes,sku',
            'size.*'        => 'required|min:3|max:20|string',
            'sale_price.*'  => 'required',
            'price.*'       => 'required',
            'stock.*'       => 'required|numeric',

        ];
    }
}
