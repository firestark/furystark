<?php


class completion
{
    public $exercise, $set, $kg;

    function __construct ( $exercise, int $set, float $kg )
    {
        $this->exercise = $exercise;
        $this->set = $set;
        $this->kg = $kg;
    }
}