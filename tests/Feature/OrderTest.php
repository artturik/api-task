<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Testing storing a order
     * @dataProvider orderProvider
     * @return void
     */
    public function testStoring($name, $price, $type, $size, $color, $count)
    {
        $response = $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $productId = $response->json('data.id');
        $response = $this->json('post', route('api.order.store'),  [
            'products' => [
                [
                    'id' => $productId,
                    'count' => $count,
                ]
            ],

        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'data' => [
                'id' => 1,
            ],
        ]);
    }

    /**
     * Testing storing a order
     * @dataProvider orderProvider
     * @return void
     */
    public function testViewing($name, $price, $type, $size, $color, $count)
    {
        $response = $this->json('post', route('api.product.store'), [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $productId = $response->json('data.id');
        $response = $this->json('post', route('api.order.store'),  [
            'products' => [
                [
                    'id' => $productId,
                    'count' => $count,
                ]
            ],

        ]);

        $orderId = $response->json('data.id');
        $response = $this->json('get', route('api.order.view'));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                [
                    'id' => $orderId,
                    'products' => [
                        'data' => [
                            [
                                'id' => $productId,
                                'name' => $name,
                                'price' => $price,
                                'type' => $type,
                                'size' => $size,
                                'color' => $color
                            ]
                        ]
                    ]
                ]
            ],
        ]);
    }



    /**
     * @dataProvider invalidOrderPriceProvider
     * @return void
     */
    public function testInvalidOrderPrice($name, $price, $type, $size, $color, $count)
    {
        $response = $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $productId = $response->json('data.id');
        $response = $this->json('post', route('api.order.store'),  [
            'products' => [
                [
                    'id' => $productId,
                    'count' => $count,
                ]
            ],

        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'products' => ['Total order price is too small'],
            ],
        ]);
    }

    public function testNotExistentProductOrder()
    {

        $response = $this->json('post', route('api.order.store'),  [
            'products' => [
                [
                    'id' => 235475,
                    'count' => 1,
                ]
            ],

        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'products.0.id' => ['The selected products.0.id is invalid.'],
            ],
        ]);
    }

    public function orderProvider()
    {
        return [
            [
                'name' => 'test product',
                'price' => '1.01',
                'type' => 'mug',
                'size' => 'xl',
                'color' => 'white',
                'count' => 10,
            ],
            [
                'name' => 't',
                'price' => '13.01',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
                'count' => 1,
            ],
        ];
    }

    public function invalidOrderPriceProvider()
    {
        return [
            [
                'name' => 'test product',
                'price' => '1.01',
                'type' => 'mug',
                'size' => 'xl',
                'color' => 'white',
                'count' => 3,
            ],
            [
                'name' => 't',
                'price' => '0.01',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
                'count' => 1,
            ],
        ];
    }


}
