<?php

namespace Chustilla\Fractal\factories;

use Cake\Http\Response;

class ResponseFactory
{
    public static function create($data, ?array $extraData = null, ?string $resourceKey = null)
    {
        $data = json_decode($data);

        if ($resourceKey) {
            $transformedData = new \stdClass();
            $transformedData->{$resourceKey} = $data;
            $data = $transformedData;
        }

        if ($extraData) {
            self::setExtraData($data, $extraData);
        }

        return (new Response())
            ->withType("json")
            ->withStringBody(json_encode($data));
    }

    private static function setExtraData($data, array $extraData)
    {
        foreach ($extraData as $propertyName => $value) {
            if (is_a($data, \stdClass::class)) {
                $data->{$propertyName} = $value;
            } elseif (is_array($data)) {
                $data[$propertyName] = $value;
            }
        }
    }
}
