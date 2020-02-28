<?php

namespace Firestark;

class Input
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function get(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }
}