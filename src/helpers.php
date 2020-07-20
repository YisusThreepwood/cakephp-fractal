<?php

use Chustilla\Fractal\factories\FractalFactory;
use League\Fractal\Serializer\SerializerAbstract;

if (! function_exists('fractal')) {
    function fractal(
        $data = null,
        $transformer = null,
        ?array $extraData = null,
        ?SerializerAbstract $serializer = null,
        ?string $resourceKey = null
    ) {
        return FractalFactory::create($data, $transformer, $extraData, $serializer, $resourceKey);
    }
}
