<?php

namespace Chustilla\Fractal;

use Cake\ORM\Entity;
use Chustilla\Fractal\contracts\Fractable;
use Chustilla\Fractal\factories\ResponseFactory;
use Chustilla\Fractal\serializers\CustomArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\SerializerAbstract;

class Fractal implements Fractable
{
    private $data;
    private $transformer;
    private $fractalizer;
    private $extraData;
    private $resourceKey;

    public function __construct(
        $data,
        $transformer,
        ?array $extraData = null,
        ?SerializerAbstract $serializer = null,
        ?string $resourceKey = null
    ) {
        $this->data = $data;
        $this->transformer = $transformer;
        $this->fractalizer = new Manager();
        $this->fractalizer->setSerializer($serializer ?: new CustomArraySerializer());
        $this->extraData = $extraData;
        $this->resourceKey = $resourceKey;
    }

    public function respond($status = 200, $headers = [])
    {
        $data = $this->fractalizer->createData(
            is_a($this->data, Entity::class)
                ? new Item($this->data, $this->transformer)
                : new Collection($this->data, $this->transformer)
        );

        return ResponseFactory::create(
            !is_array($data) ? $data->toJson() : $data,
            $this->extraData,
            $this->resourceKey
        )->withStatus($status);
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
