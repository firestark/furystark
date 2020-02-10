<?php

namespace session;

class completions
{
    public $exercise, $kg;

    function __construct ( exercise $exercise, float $kg )
    {
        $this->exercise = $exercise;
        $this->kg = $kg;
    }
}