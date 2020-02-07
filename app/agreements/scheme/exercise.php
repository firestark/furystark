<?php

namespace scheme;

class exercise
{
    public $name, $sets, $reps;

    function __construct ( string $name, int $sets, int $reps )
    {
        $this->name = $name;
        $this->sets = $sets;
        $this->reps = $reps;
    }
}