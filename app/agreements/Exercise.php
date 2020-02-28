<?php

class Exercise
{
    public $id, $name, $sets, $reps;

    public function __construct($id, String $name, Int $sets, Int $reps)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sets = $sets;
        $this->reps = $reps;
    }
}