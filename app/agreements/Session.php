<?php

class Session
{
    public $id, $scheme, $completions;

    public function __construct($id, Scheme $scheme, Array $completions = [])
    {
        $this->id = $id;
        $this->scheme = $scheme->id;
        $this->completions = $completions;
    }

    public function set(Completion $completion)
    {
        $this->completions[$completion->exercise][$completion->set - 1] = $completion->kg;
    }

    public function getCompletion($exercise, Int $set)
    {
        return $this->completions[$exercise][$set -1] ?? null;
    }
}