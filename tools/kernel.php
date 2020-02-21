<?php

namespace firestark;

use http\dispatcher;
use http\request;


class kernel
{
    private $dispatcher, $guard, $session, $redirector;

    public function __construct ( dispatcher $dispatcher, guard $guard, session $session, redirector $redirector )
    {
        $this->dispatcher = $dispatcher;
        $this->guard = $guard;
        $this->session = $session;
        $this->redirector = $redirector;
    }

    public function handle ( request $request ) : \http\response
    {
        $token = $this->session->get ( 'token', '' );

        if ( $this->guard->allows ( $request, $token ) )
            return $this->run ( $request );

        return $this->deny ( $request );
    }

    public function run ( request $request ) : \http\response
    {
        list ( $task, $arguments ) = $this->dispatcher->match ( $request->method, $request->uri );
        
        // setting the arguments matched from the router onto the http request object
        // so they can be used throughout the app from the input facade
        foreach ( $arguments as $key => $value )
            \input::set ( $key, $value );
        
        return call_user_func_array ( $task, $arguments );
    }

    private function deny ( request $request )
    {
        return $this->redirector->to ( '/login' );
    }
}