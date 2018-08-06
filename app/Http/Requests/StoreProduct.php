<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
        // unique validation for color, type, size
        $unique = Rule::unique('products', 'color')
                ->where('type', $this->get('type'))
                ->where('size', $this->get('size'));

        return [
            'name' => 'required|max:255',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/|not_in:0', // to allow decimals and restrict 0
            'type' => 'required|max:255',
            'size' => 'required|max:255',
            'color' => "required|max:255|$unique"
        ];
    }

    public function messages()
    {
        $priceMessage = 'Price should be higher than 0 and be in format with max two decimal numbers';
        return [
            'color.unique' => 'We already have product with same color, type and size',
            'price.required' => $priceMessage,
            'price.regex' => $priceMessage,
            'price.not_in' => $priceMessage,
        ];
    }
}
