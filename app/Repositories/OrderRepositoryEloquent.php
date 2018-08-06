<?php

namespace App\Repositories;

use App\Presenters\OrderPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderRepository;
use App\Models\Order;

/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return OrderPresenter::class;
    }

    public function filterOrdersWithProductType($type){
        $this->scopeQuery(function($query) use ($type) {
            return $query
                ->select('orders.*')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                ->join('products', 'order_product.product_id', '=', 'products.id')
                ->where('products.type', $type);
        });
    }
    
}
