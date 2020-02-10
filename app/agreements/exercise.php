<?php

class exercise
{
    public $id, $name, $sets, $reps;

    function __construct ( $id, string $name, int $sets, int $reps )
    {
        $this->id = $id;
        $this->name = $name;
        $this->sets = $sets;
        $this->reps = $reps;
    }
}