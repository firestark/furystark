<?php

class FlatfileSchemeManager implements Scheme\Manager
{
    private $schemes = [];

    public function __construct(Array $schemes)
    {
        foreach ($schemes as $scheme)
            $this->schemes[$scheme->id] = $scheme;
    }

    public function all(): Array
    {
        return $this->schemes;
    }

    public function has($id): Bool
    {
        return isset($this->schemes[$id]);
    }

    public function find($id): Scheme
    {
        return $this->schemes[$id];
    }
}