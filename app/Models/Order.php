<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{

    public $fillable = [
        '[products]'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function total() : float
    {
        $total = 0;
        $products = $this->products;
        foreach($products as $product){
            $total += $product->price;
        }

        return (float) $total;
    }
}
