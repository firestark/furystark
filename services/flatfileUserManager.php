<?php

use firestark\credentials;
use firestark\userManager;

class flatfileUserManager implements userManager
{
    private $users = [ ];
    private $file = '';

    function __construct ( string $file, array $users )
    {
        $this->file = $file;
        $this->users = $users;
    }

    function register ( credentials $credentials )
    {        
        $this->users [ $credentials->username ] = $credentials;
        $this->write ( );
    }

    function has ( credentials $credentials ) : bool
    {
        return ( 
            isset ( $this->users [ $credentials->username ] ) && 
            $this->users [ $credentials->username ]->password === $credentials->password
        );
    }

    function registered ( string $username ) : bool
    {
        return isset ( $this->users [ $username ] );
    }

    private function write ( )
	{
		file_put_contents ( $this->file, serialize ( $this->users ) );
    }
}