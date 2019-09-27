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

    function remove ( string $name )
    {
        unset ( $this->exercises [ $name ] );
        $this->write ( );
    }

    function find ( string $name ) : exercise
    {
        return $this->exercises [ $name ];
    }

    private function write ( )
    {
        file_put_contents ( $this->file, serialize ( $this->exercises ) );
    }
}