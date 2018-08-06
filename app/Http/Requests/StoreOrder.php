<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Validation\Validator;

class StoreOrder extends FormRequest
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
            'products.*.id' => 'required|exists:products',
            'products.*.count' => 'required|integer|min:1'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isEmpty() && !$this->validateTotalPrice()) {
                $validator->errors()->add('products', 'Total order price is too small');
            }
        });
    }

    protected function validateTotalPrice(int $minPrice = 10) : bool
    {
        $total = 0;
        $products = $this->validated();

        foreach($products['products'] as $product){
            $total += Product::find($product['id'], ['price'])->price * $product['count'];
            if($total >= $minPrice){
                return true;
            }
        }
        return false;
    }
}
