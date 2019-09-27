<?php

app::bind ( scheme::class, function ( $app )
{
    if ( input::has ( 'id' ) )
        return $app [ scheme\manager::class ]->find ( input::get ( 'id' ) );

    return new scheme ( uniqid ( ), input::get ( 'name' ) );
} );