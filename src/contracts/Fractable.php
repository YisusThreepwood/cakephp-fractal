<?php

namespace Chustilla\Fractal\contracts;

interface Fractable
{
    public function respond($status, $headers);
    public function parseIncludes($includes);
}
