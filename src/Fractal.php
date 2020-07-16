<?php

namespace Chustilla\Fractal;

use Chustilla\Fractal\contracts\Fractable;
use Chustilla\Fractal\factories\ResponseFactory;
use Chustilla\Fractal\serializers\CustomArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\SerializerAbstract;

class Fractal implements Fractable
{
    private $data;
    private $transformer;
    private $fractalizer;

    public function __construct($data, $transformer, ?SerializerAbstract $serializer = null)
    {
        $this->data = $data;
        $this->transformer = $transformer;
        $this->fractalizer = new Manager();
        $this->fractalizer->setSerializer($serializer ?: new CustomArraySerializer());
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
