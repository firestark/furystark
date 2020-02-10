<?php

use function compact as with;

route::get ( '/session/{id}', function ( $id )
{
    $session = app::make ( session::class, with ( 'id' ) );
    $scheme = app::make ( scheme::class, [ 'id' => $session->scheme ] );
    
    $exercise = 1;
    $set = 1;

    
    return view::make ( 'session', with ( 'session', 'scheme', 'exercise', 'set' ) );
} );