<?php

use Chustilla\Fractal\factories\FractalFactory;

if (! function_exists('fractal')) {
    function fractal($data = null, $transformer = null)
    {
        return FractalFactory::create($data, $transformer);
    }
}
