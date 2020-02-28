<?php

namespace Firestark\Middlewares;

use Firestark\App;
use Firestark\Http\Redirector;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Server\MiddlewareInterface as Middleware;

class Redirect implements Middleware
{
    private $app = null;
    
    public function __construct(app $app)
    {
        $this->app = $app;
    }
    
    public function process(request $request, handler $handler): Response
    {
        $previousUri = $this->app['sess']->get('previous-uri', '/');
        $this->app->instance('redirector', new Redirector($previousUri));
        $response = $handler->handle($request);
        $this->app['sess']->flash('previous-uri', $this->app['request']->getUri()->getPath() . '?' . $request->getUri()->getQuery());
        return $response;
    }
}

