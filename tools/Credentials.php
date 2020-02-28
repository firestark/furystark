<?php

namespace Firestark;

class Credentials
{
    public $username, $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = hash('sha256', $password);
    }
}