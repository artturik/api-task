<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $type = $faker->randomElement(['shirt', 'backpack', 'swimwear', 'leggings', 'mug']);
    return [
        'type' => $type,
        'color' => $faker->colorName,
        'name' => "$type {$faker->word}",
        'price' => $faker->randomFloat(2, 10, 100),
        'size' => $faker->randomElement(['xs', 's', 'm', 'l', 'xl'])
    ];
});
