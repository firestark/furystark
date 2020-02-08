<?php

class flatfileSchemeManager implements scheme\manager
{
    private $schemes = [ ];

    function __construct ( array $schemes )
    {
        foreach ( $schemes as $scheme )
            $this->schemes [ $scheme->id ] = $scheme;
    }

    function all ( ) : array
    {
        return $this->schemes;
    }

    function has ( $id ) : bool
    {
        return ( isset ( $this->schemes [ $id ] ) );
    }

    function find ( $id ) : scheme
    {
        return $this->schemes [ $id ];
    }
}