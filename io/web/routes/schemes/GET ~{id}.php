<?php

route::get ( '/schemes/{id}', function ( )
{
    list ( $status, $payload ) = app::make ( 'i want to see my scheme' );
    return app::call ( status::match ( $status ), $payload );
} );