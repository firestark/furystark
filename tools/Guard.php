<?php

namespace Firestark;

use Psr\Http\Message\ServerRequestInterface as Request;

abstract class Guard
{
    /**
     * @var $public
     * All the publicly accessible routes.
     */
    private $public = [ 
        'GET' => ['/login', '/register', '/onboarding'], 
        'POST' => ['/login', '/register']
    ];

    /**
     * Generate and store a token for given credentials.
     * @param credentials   The credentials to generate a token from.
     * @return string       The generated token.
     */
    abstract public function stamp(credentials $credentials): string;

    /**
     * Check if the given token is valid.
     */
    abstract public function authenticate(string $token): bool;

    abstract public function getToken(): string;

    /**
     * Remove token.
     */
    abstract public function invalidate();

    /**
     * Check if the guard allows access to a given request.
     * @param string $request       The application feature request.
     * @param string $token         An optional token to access the $request with. 
     */
    public function allows(Request $request, string $token = ''): bool
    {
        
        if (in_array($request->getUri()->getPath(), $this->public[$request->getMethod()]))
            return true;
        
        return $this->authenticate($token);
    }
}