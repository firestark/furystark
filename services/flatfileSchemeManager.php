<?php

class flatfileSchemeManager implements scheme\manager
{
    public $schemes = [ ];
    private $file = '';

    function __construct ( array $schemes, string $file )
    {
        $this->schemes = $schemes;
        $this->file = $file;
    }

    function add ( scheme $scheme )
    {
        $this->schemes [ $scheme->id ] = $scheme;
        $this->write ( );
    }

    function update ( scheme $scheme )
    {
        $this->schemes [ $scheme->id ] = $scheme;
        $this->write ( );
    }

    function all ( ) : array
    {
        return $this->schemes;
    }

    function find ( $id ) : scheme
    {
        return $this->schemes [ $id ];
    }

    // function has ( scheme $scheme ) : bool
    // {
    //     return isset ( $this->schemes [ $scheme->id ] );
    // }

    // function remove ( scheme $scheme )
    // {
    //     unset ( $this->schemes [ $scheme->id ] );
    //     $this->write ( );
    // }

    private function write ( )
    {
        file_put_contents ( $this->file, serialize ( $this->schemes ) );
    }
}