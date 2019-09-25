<?php

app::share ( scheme\manager::class, function ( )
{
    $file = __DIR__ . '/../../storage/databases/files/schemes.data';
    $schemes = unserialize ( file_get_contents ( $file ) );

    if ( ! is_array ( $schemes ) )
        $schemes = [ ];

    return new flatfileSchemeManager ( $schemes, $file );
} );