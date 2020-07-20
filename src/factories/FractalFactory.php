<?php

namespace Chustilla\Fractal\factories;

use Chustilla\Fractal\Fractal;
use League\Fractal\Serializer\SerializerAbstract;

class FractalFactory
{
    public static function create(
        $data = null,
        $transformer = null,
        ?array $extraData = null,
        ?SerializerAbstract $serializer = null,
        ?string $resourceKey = null
    ) {
        return new Fractal($data, $transformer, $extraData, $serializer, $resourceKey);
    }
}
