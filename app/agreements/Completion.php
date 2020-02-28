<?php

class Completion
{
    public $exercise, $set, $kg;

    public function __construct($exercise, Int $set, Float $kg)
    {
        $this->exercise = $exercise;
        $this->set = $set;
        $this->kg = $kg;
    }
}