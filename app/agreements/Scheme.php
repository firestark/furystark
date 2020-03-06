<?php

class Scheme
{
    public $id, $name, $exercises, $createdAt;

    public function __construct($id, String $name, Array $exercises = [], DateTime $createdAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->exercises = $exercises;
        $this->createdAt = $createdAt ?? new DateTime;
    }

    public function add(Exercise $exercise)
    {
        $this->exercises[] = $exercise;
    }

    public function remove(Exercise $exercise)
    {
        foreach($this->exercises as $key => $stored)
            if($stored->id === $exercise->id) {
                unset($this->exercises[$key]);
                break;
            }
    }
}