<?php

route::get ( '/schemes/{id}/routines/{routine_id}/remove', function ( )
{
    list ( $status, $payload ) = app::make ( 'i want to remove a routine' );
    return app::call ( status::match ( $status ), $payload );
} );
