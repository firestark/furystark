<?php


class completion
{
    public $exercise, $kg;

    function __construct ( $exercise, float $kg )
    {
        $this->exercise = $exercise;
        $this->kg = $kg;
    }
}