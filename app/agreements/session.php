<?php

class session
{
    public $id, $scheme, $completions;

    function __construct ( $id, scheme $scheme, array $completions = [ ] )
    {
        $this->id = $id;
        $this->scheme = $scheme->id;
        $this->completions = $completions;
    }

    function set ( completion $completion )
    {
        $this->completions [ $completion->exercise ] [ $completion->set - 1 ] = $completion->kg;
    }

    function getCompletion ( $exercise, int $set )
    {
        return $this->completions [ $exercise ] [ $set -1 ] ?? null;
    }
}