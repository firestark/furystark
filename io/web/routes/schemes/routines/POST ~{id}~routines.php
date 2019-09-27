<?php


route::post ( '/schemes/{id}/routines', function ( $id )
{
    list ( $status, $payload ) = app::make ( 'i want to add a routine' );
    return app::call ( status::match ( $status ), $payload );
} );