<?php

namespace Chustilla\Fractal\factories;

use Chustilla\Fractal\Fractal;
use League\Fractal\Serializer\SerializerAbstract;

class FractalFactory
{
    public static function create($data = null, $transformer = null, ?SerializerAbstract $serializer = null)
    {
        return new Fractal($data, $transformer, $serializer);
    }
}
