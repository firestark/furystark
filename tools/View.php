<?php

namespace Firestark;

use Firestark\Http\Response as Factory;
use Jenssegers\Blade\Blade as Engine;
use Psr\Http\Message\ResponseInterface as Response;

class View
{
    private $response, $view;

    public function __construct(Factory $response, Engine $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

    public function make(string $template, array $data = []): Response
    {
        $view = $this->view->make($template, $data);
        return $this->response->ok((string) $view);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->view, $method], $args);
    }
}
