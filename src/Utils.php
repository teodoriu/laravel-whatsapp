<?php

namespace Teodoriu\Whatsapp;

use Illuminate\Support\Arr;
use Teodoriu\Whatsapp\Exceptions\MalformedPayloadException;

abstract class Utils
{
    /**
     * @throws MalformedPayloadException
     */
    public static function extract(array $payload, string|array $path, bool $throw = true): mixed
    {
        $results = [];
        foreach ((array)$path as $p) {
            if($p === 'request_welcome') {
                continue;
            }

            if (!Arr::has($payload, $p) && $throw) {
                throw new MalformedPayloadException($p);
            }

            $results[] = Arr::get($payload, $p);
        }

        return count($results) === 1 ? $results[0] : $results;
    }

    public static function fill(array &$array, string|array $path, mixed $value = null, bool $ignoreNull = true): array
    {
        if (is_string($path)) {
            $path = [$path => $value];
        }

        foreach ($path as $currentPath => $value) {
            if ($ignoreNull && $value === null) {
                continue;
            }

            Arr::set($array, $currentPath, $value);
        }
        return $array;
    }
}
