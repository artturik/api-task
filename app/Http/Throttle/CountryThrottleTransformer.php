<?php

namespace App\Http\Throttle;

use GrahamCampbell\Throttle\Data;
use GrahamCampbell\Throttle\Transformers\TransformerInterface;

class CountryThrottleTransformer implements TransformerInterface
{

    /**
     * Transform the data into a new data instance.
     *
     * @param \Illuminate\Http\Request $data
     * @param int                      $limit
     * @param int                      $time
     *
     * @return \GrahamCampbell\Throttle\Data
     */
    public function transform($data, int $limit = 10, int $time = 60)
    {
        return new Data((string) geoip($data->getClientIp())->iso_code, '', (int) $limit, (int) $time);
    }
}