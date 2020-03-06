<?php

class Session
{
    public $id, $scheme, $completions, $createdAt;

    public function __construct($id, Scheme $scheme, Array $completions = [], DateTime $createdAt = null)
    {
        $this->id = $id;
        $this->scheme = $scheme->id;
        $this->completions = $completions;
        $this->createdAt = $createdAt ?? new DateTime;
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