<?php

use Firebase\JWT\JWT;
use firestark\credentials;
use firestark\guard;
use firestark\session;

class jwtSessionGuard extends guard
{
    const key = 'eye-fire';
    private $session = null;

    function __construct ( session $session )
    {
        $this->session = $session;
    }

    function stamp ( credentials $credentials ) : string
    {
        $token = JWT::encode (
            [ 'credentials' => serialize ( $credentials )
            ]
        , self::key
        );

        $this->session->set ( 'token', $token );
        return $token;
    }

    function stamped ( ) : bool
    {
        return $this->session->has ( 'token' );
    }

    function authenticate ( string $token ) : bool
    {
        try {
            JWT::decode ( $token, self::key, array ( 'HS256' ) );
            return true;
        } catch ( exception $e ) {
            return false;
        }
    }

    function invalidate ( )
    {
        $this->session->unset ( 'token' );
    }

    function getToken ( ) : string
    {
        return $this->session->get ( 'token', '' );
    }

    function current ( ) : credentials
    {
        try {
            return unserialize ( JWT::decode ( $this->session->get ( 'token' ), self::key, array ( 'HS256' ) )->credentials );
        }
        catch ( exception $e ) {
            return new credentials ( '', '' );
        }
    }
}