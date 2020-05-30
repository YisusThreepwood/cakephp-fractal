<?php

namespace Chustilla\Fractal\factories;

use Cake\Http\Response;

class ResponseFactory
{
    public static function create($data)
    {
        return (new Response())
            ->withType("json")
            ->withStringBody($data);
    }
}
