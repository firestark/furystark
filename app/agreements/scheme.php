<?php

use scheme\routine;

class scheme
{
    public $id = null;
    public $name = '';
    public $routines = [ ];

    function __construct ( $id, string $name, array $routines = [ ] )
    {
        $this->id = $id;
        $this->name = $name;
        $this->routines = $routines;
    }

    function add ( routine $routine )
    {
        $this->routines [ $routine->id ] = $routine;
    }

    function remove ( routine $routine )
    {
        unset ( $this->routines [ $routine->id ] );
    }
}