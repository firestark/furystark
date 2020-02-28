<?php

namespace Firestark\Middlewares;

use Firestark\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Server\MiddlewareInterface as Middleware;

class Input implements Middleware
{
    private $app = null;
    
    public function __construct (app $app)
    {
        $this->app = $app;
    }
    
    public function process(Request $request, Handler $handler): Response
    {
        if ($request->getHeaderLine('Content-Type') === 'application/json')
            $data = $this->parseJson($request);
        else
            $data = $this->parseForm($request);
        
        $this->app->instance('input', new \Firestark\Input($data));
        return $handler->handle($request); 
    }

    private function parseForm(Request $request): array
    {
        parse_str($request->getUri()->getQuery(), $query);
        parse_str((string) $request->getBody(), $post);

        return array_merge($post, $query);
    }

    private function parseJson(request $request): array
    {
        $query = (array) json_decode($request->getUri()->getQuery());
        $post = (array) json_decode($request->getBody());

        return array_merge($post, $query);
    }
}

