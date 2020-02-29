<?php

class Person
{
    public $name;

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return ucfirst($this->name);
    }

    public function initials()
    {
        return ucfirst($this->name[0]);
    }
}