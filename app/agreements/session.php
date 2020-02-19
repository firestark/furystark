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

    function add ( completion $completion )
    {
        $this->completions [ ] = $completion;
    }

    function getCompletion ( $exerciseId, int $set )
    {
        foreach ( $this->completions as $completion )
            if ( $completion->exercise === $exerciseId )
                $completions [ ] = $completion;

        return $completions [ $set - 1 ] ?? null;
    }
}