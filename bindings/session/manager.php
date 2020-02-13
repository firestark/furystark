<?php

app::share ( session\manager::class, function ( $app )
{
    $person = strtolower ( $app [ person::class ]->name );
    $file = __DIR__ . '/../../storage/databases/files/' . $person . '/sessions.data';

    $sessions = unserialize ( file_get_contents ( $file ) );

    if ( ! is_array ( $sessions ) )
        $sessions = [ ];

    return new flatfileSessionManager ( $file, $sessions );
} );