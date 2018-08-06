<?php

namespace Tests\Feature;

use Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     *
     * Testing storing a product
     * @dataProvider productProvider
     * @return void
     */
    public function testStoring($name, $price, $type, $size, $color)
    {
        $response = $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
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
     *
     * Testing unique validation a product
     * @depends testStoring
     * @dataProvider productProvider
     * @return void
     */
    public function testUniqueValidator($name, $price, $type, $size, $color)
    {
        $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $response = $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'color' => ['We already have product with same color, type and size']
            ],
        ]);
    }

    /**
     *
     * Testing price validation a product
     * @dataProvider invalidPriceProvider
     * @return void
     */
    public function testPriceValidator($name, $price, $type, $size, $color)
    {
        $response = $this->json('post', route('api.product.store'),  [
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'size' => $size,
            'color' => $color,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'price' => ['Price should be higher than 0 and be in format with max two decimal numbers']
            ]
        ]);
    }


    public function productProvider()
    {
        return [
            [
                'name' => 'test product',
                'price' => '123.12',
                'type' => 'mug',
                'size' => 'xl',
                'color' => 'white',
            ],
            [
                'name' => 't',
                'price' => '0.01',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
        ];
    }

    public function invalidPriceProvider()
    {
        return [
            [
                'name' => 't',
                'price' => '0.00',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
            [
                'name' => 't',
                'price' => '0.00',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
            [
                'name' => 't',
                'price' => '0',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
            [
                'name' => 't',
                'price' => '-10',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
            [
                'name' => 't',
                'price' => 'abc',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
            [
                'name' => 't',
                'price' => '',
                'type' => 'shirt',
                'size' => 's',
                'color' => 'black',
            ],
        ];
    }
}
