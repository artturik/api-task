<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Repositories\OrderRepository;
use DB;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Order controller,  and saving orders
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    protected $repository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    /**
     * Responsible for viewing all orders and filtering orders with products with some type
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function view(Request $request){
        if($type = $request->get('type')){
            $this->repository->filterOrdersWithProductType($type);
        }

        return response()->json(['success' => true] + $this->repository->all());
    }

    /**
     * @param StoreOrder $request
     * @return mixed
     */
    public function store(StoreOrder $request){
        $order = $this->repository->skipPresenter()->create($request->all());

        foreach($request->get('products') as $product){
            for($i = 0; $i < $product['count']; $i++) {
                $order->products()->attach($product['id']);
            }
        }

        return response()->api(['id' => $order->id], 201);
    }
}
