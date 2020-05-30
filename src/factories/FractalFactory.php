<?php

namespace Chustilla\Fractal\factories;

use Chustilla\Fractal\Fractal;

class FractalFactory
{
    public static function create($data = null, $transformer = null)
    {
        return new Fractal($data, $transformer);
    }
}
