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
}