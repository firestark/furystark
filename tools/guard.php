<?php

namespace firestark;

use firestark\user\credentials;

abstract class guard
{
    /**
     * @var $public
     * All the publicly accessible routes.
     */
    private $public = 
        [ 'GET' => [ '/login', '/register', '/onboarding' ]
        , 'POST' => [ '/login', '/register' ]
        ];

    /**
     * Generate and store a token for given credentials.
     * @param credentials   The credentials to generate a token from.
     * @return string       The generated token.
     */
    abstract function stamp ( credentials $credentials ) : string;

    /**
     * Check if the given token is valid.
     */
    abstract function authenticate ( string $token ) : bool;

    abstract function getToken ( ) : string;

    /**
     * Remove token.
     */
    abstract function invalidate ( );

    /**
     * Check if the guard allows access to a given request.
     * @param string $request       The application feature request.
     * @param string $token         An optional token to access the $request with. 
     */
    function allows ( request $request, string $token = '' ) : bool
    {
        if ( in_array ( $request->uri, $this->public [ $request->method ] ) )
            return true;
        
        return $this->authenticate ( $token );
    }
}