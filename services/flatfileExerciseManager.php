<?php

class flatfileExerciseManager implements exercise\manager
{
    private $file = '';
    private $exercises = [ ];

    function __construct ( string $file, array $exercises = [ ] )
    {
        $this->file = $file;
        $this->exercises = $exercises;
    }

    function has ( exercise $exercise ) : bool
    {
        return isset ( $this->exercises [ $exercise->name ] );
    }

    function add ( exercise $exercise )
    {
        $this->exercises [ $exercise->name ] = $exercise;
        $this->write ( );
    }

    function all ( ) : array
    {
        return $this->exercises;
    }

    private function write ( )
    {
        file_put_contents ( $this->file, serialize ( $this->exercises ) );
    }
}