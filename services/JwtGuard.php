<?php

use Firebase\JWT\JWT;
use Firestark\Credentials;
use Firestark\Guard;
use Firestark\Session;

class JwtGuard extends Guard
{
    const key = 'eye-fire';
    private $token = '';

    public function __construct(String $token = '')
    {
        $this->token = $token;
    }

    public function stamp(Credentials $credentials): String
    {
        $this->token = JWT::encode(['credentials' => serialize ( $credentials )], self::key);
        return $this->token;
    }

    public function stamped(): Bool
    {
        return ($this->token !== '');
    }

    public function authenticate(string $token): Bool
    {
        try {
            JWT::decode($token, self::key, array('HS256'));
            return true;
        } catch(exception $e) {
            return false;
        }
    }

    public function invalidate()
    {
        $this->token = '';
    }

    public function getToken(): String
    {
        return $this->token;
    }

    public function current(): Credentials
    {
        try {
            return unserialize(JWT::decode($this->token, self::key, array ('HS256'))->credentials);
        }
        catch(exception $e) {
            return new Credentials('', '');
        }
    }
}