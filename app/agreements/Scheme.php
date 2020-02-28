<?php

class Scheme
{
    public $id, $name, $exercises;

    public function __construct($id, String $name, Array $exercises = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->exercises = $exercises;
    }
}