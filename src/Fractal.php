<?php

namespace Chustilla\Fractal;

use Chustilla\Fractal\contracts\Fractable;
use Chustilla\Fractal\factories\ResponseFactory;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class Fractal implements Fractable
{
    private $data;
    private $transformer;
    private $fractalizer;

    public function __construct($data, $transformer)
    {
        $this->data = $data;
        $this->transformer = $transformer;
        $this->fractalizer = new Manager();
    }

    public function respond($status = 200, $headers = [])
    {
        $data = $this->fractalizer->createData(
            new Collection($this->data, $this->transformer)
        );

        return ResponseFactory::create($data->toJson())->withStatus($status);
    }

    public function parseIncludes($includes): Fractable
    {
        $this->fractalizer->parseIncludes($includes);
        return $this;
    }

    public function parseExcludes($excludes): Fractable
    {
        $this->fractalizer->parseExcludes($excludes);
        return $this;
    }
}
