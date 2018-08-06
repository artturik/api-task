<?php

namespace App\Http\Throttle;

use GrahamCampbell\Throttle\Transformers\TransformerFactoryInterface;

class CountryThrottleFactory implements TransformerFactoryInterface
{
    public function make($data)
    {
        return new CountryThrottleTransformer();
    }
}