<?php

use function compact as with;

route::get ( '/session/{id}', function ( $id )
{
    $session = app::make ( session::class, with ( 'id' ) );
    $scheme = app::make ( scheme::class, [ 'id' => $session->scheme ] );

    $set = 1;
    $round = 1;
    $exercise = $scheme->exercises [ $round -1 ]->id;
    
    return view::make ( 'session', with ( 'session', 'scheme', 'exercise', 'round', 'set' ) );
} );