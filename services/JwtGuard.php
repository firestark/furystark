<?php

use Firebase\JWT\JWT;
use Firestark\Credentials;
use Firestark\Guard;
use Firestark\Session;

class JwtGuard extends Guard
{
    const key = 'eye-fire';
    private $token = '';

    public function __construct(string $token = '')
    {
        $this->token = $token;
    }

    public function stamp(Credentials $credentials): string
    {
        $this->token = JWT::encode(['credentials' => serialize ( $credentials )], self::key);
        return $this->token;
    }

    public function stamped(): bool
    {
        return ($this->token !== '');
    }

    public function authenticate(string $token): bool
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

    public function getToken(): string
    {
        return $this->token;
    }

    public function current(): credentials
    {
        try {
            return unserialize(JWT::decode($this->token, self::key, array ('HS256'))->credentials);
        }
        catch(exception $e) {
            return new credentials('', '');
        }
    }
}