<?php

class scheme
{
    public $id, $name, $exercises;

    function __construct ( $id, string $name, array $exercises = [ ] )
    {
        $this->id = $id;
        $this->name = $name;
        $this->exercises = $exercises;
    }
}