<?php

use function compact as with;

route::get ( '/session/{id}', function ( $id )
{
    $session = app::make ( session::class, with ( 'id' ) );
    $scheme = app::make ( scheme::class, [ 'id' => $session->scheme ] );
    
    return view::make ( 'session', with ( 'session', 'scheme' ) );
} );