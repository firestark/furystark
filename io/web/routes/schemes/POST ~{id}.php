<?php

use function compact as with;

route::post ( '/schemes/{id}', function ( $id )
{
    $scheme = app::make ( scheme\manager::class )->find ( $id );
    $scheme->name = input::get ( 'name' );

    list ( $status, $payload ) = app::make ( 'i want to update a scheme', with ( 'scheme' ) );
    return app::call ( status::match ( $status ), $payload );
} );