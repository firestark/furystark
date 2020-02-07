<?php

namespace firestark;

use http\response\factory;
use Jenssegers\Blade\Blade as engine;

class view
{
    private $response, $view;

    public function __construct ( factory $response, engine $view )
    {
        $this->response = $response;
        $this->view = $view;
    }

    public function make ( string $template, array $data = [ ] ) : \http\response
    {
        $view = $this->view->make ( $template, $data );
        return $this->response->ok ( ( string ) $view );
    }
}
