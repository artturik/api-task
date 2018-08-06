<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Product;

/**
 * Class ProductTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Transform the Product entity.
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => (string) $model->name,
            'type' => (string) $model->type,
            'color' => (string) $model->color,
            'size' => (string) $model->size,
            'price' => (float) $model->price,
        ];
    }
}
