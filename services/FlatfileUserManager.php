<?php

use Firestark\Credentials;
use Firestark\UserManager;

class FlatfileUserManager implements UserManager
{
    private $users = [];
    private $file = '';

    function __construct(string $file, Array $users)
    {
        $this->file = $file;
        $this->users = $users;
    }

    function register(Credentials $credentials)
    {        
        $this->users[$credentials->username] = $credentials;
        $this->write();
    }

    function has(Credentials $credentials): Bool
    {
        return (
            isset($this->users[$credentials->username]) && 
            $this->users[$credentials->username]->password === $credentials->password
        );
    }

    function registered(string $username): Bool
    {
        return isset($this->users[$username]);
    }

    private function write()
	{
		file_put_contents($this->file, serialize($this->users));
    }
}