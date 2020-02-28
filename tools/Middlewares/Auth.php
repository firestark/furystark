<?php

namespace Firestark\Middlewares;

use Firestark\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Server\MiddlewareInterface as Middleware;

class Auth implements Middleware
{
    private $app = null;
    
    public function __construct(App $app)
    {
        $this->app = $app;
    }
    
    public function process(Request $request, Handler $handler): Response
    {
        if ($this->app['guard']->allows($request, $this->app['sess']->get('token', '')))
            return $handler->handle($request);

        return $this->deny($request);
    }

    private function deny(Request $request)
    {
        return $this->app['redirector']->to('/login');
    }
}

