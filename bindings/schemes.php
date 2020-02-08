<?php

app::share ( 'schemes', function ( $app )
{
    $person = strtolower ( $app [ person::class ]->name );
    $file = __DIR__ . '/../storage/databases/files/' . $person . '/schemes.data';

    return unserialize ( file_get_contents ( $file ) );
} );