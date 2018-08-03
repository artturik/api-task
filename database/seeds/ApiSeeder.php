<?php

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10)->create()->each(function(Order $order){
            $order->products()->saveMany(
                factory(Product::class, random_int(1, 6))->make()
            );
        });
    }
}
