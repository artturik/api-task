<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Order;

/**
 * Class OrderTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

    public $defaultIncludes = [
        'products'
    ];

    /**
     * Transform the Order entity.
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id' => (int) $model->id,
            'total' => $model->total(),
        ];
    }

    public function includeProducts(Order $model)
    {
        return $this->collection($model->products, new ProductTransformer());
    }
}
