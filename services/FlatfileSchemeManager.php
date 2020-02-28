<?php

class FlatfileSchemeManager implements scheme\manager
{
    private $schemes = [];

    public function __construct(array $schemes)
    {
        foreach ($schemes as $scheme)
            $this->schemes[$scheme->id] = $scheme;
    }

    public function all(): array
    {
        return $this->schemes;
    }

    public function has($id): bool
    {
        return isset($this->schemes[$id]);
    }

    public function find($id): scheme
    {
        return $this->schemes[$id];
    }
}