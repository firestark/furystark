<?php

class user
{
    public $name = '';
    public $password = '';

    function __construct ( string $name, string $password )
    {
        $this->name = $name;
        $this->password = $password;
    }
}