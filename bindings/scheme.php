<?php

app::bind ( scheme::class, function ( $app )
{
    $id = input::get ( 'id', uniqid ( ) );

    if ( $app [ scheme\manager::class ]->has ( $id ) )
        return $app [ scheme\manager::class ]->find ( $id );

    return new scheme ( 
        $id,
        ''
    );
} );