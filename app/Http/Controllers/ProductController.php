<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function store(StoreProduct $request, ProductRepository $productRepository){
        $product = $productRepository->skipPresenter()->create($request->all());
        return response()->api(['id' => $product->id], 201);
    }
}
