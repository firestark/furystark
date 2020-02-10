<?php

app::bind ( session::class, function ( $app, array $data )
{
    if ( isset ( $data [ 'id' ] ) && $app [ session\manager::class ]->has ( $data [ 'id' ] ) )
        return $app [ session\manager::class ]->find ( $data [ 'id' ] );

    return new session ( 
        uniqid ( ), 
        $app [ scheme::class ], 
        [ ] 
    );
} );