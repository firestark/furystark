<?php

namespace firestark\http;

use Jenssegers\Blade\Blade as blade;

class view
{
    private $response = null;

    function __construct ( blade $engine, response $response )
    {
        $this->engine = $engine;
        $this->response = $response;
    }

    function make ( string $template, array $parameters = [ ] )
    {
        $view = $this->engine->make ( $template, $parameters );
        return $this->response->ok ( 0, (string) $view );
    }
}