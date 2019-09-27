<?php

namespace Firestark;

class input
{
    private $data = [ ];

    function __construct ( array $data )
    {
        $this->data = $data;
    }

    function all ( ): array
    {
        return $this->data;
    }

    function has ( string $key ) : bool
    {
        return isset ( $this->data [ $key ] );
    }

    function get ( string $key, $default = null )
    {
        return $this->data [ $key ] ?? $default;
    }

    function set ( string $key, $value )
    {
        $this->data [ $key ] = $value;
    }
}