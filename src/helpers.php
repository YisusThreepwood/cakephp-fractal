<?php

use Chustilla\Fractal\factories\FractalFactory;
use League\Fractal\Serializer\SerializerAbstract;

if (! function_exists('fractal')) {
    function fractal($data = null, $transformer = null, ?SerializerAbstract $serializer = null)
    {
        return FractalFactory::create($data, $transformer, $serializer);
    }
}
