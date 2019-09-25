<?php

namespace scheme;

use exercise;

class routine
{
    public $id = null;
    public $exercise = null;
    public $sets = 0;
    public $reps = 0;

    function __construct ( $id, exercise $exercise, int $sets, int $reps )
    {
        $this->id = $id;
        $this->exercise = $exercise;
        $this->sets = $sets;
        $this->reps = $reps;
    }
}