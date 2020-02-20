<?php

use function compact as with;

status::matching ( 1006, function ( session $session )
{
    $scheme = app::make ( scheme::class, [ 'id' => $session->scheme ] );
    return view::make ( 'session', with ( 'session', 'scheme' ) );
} );