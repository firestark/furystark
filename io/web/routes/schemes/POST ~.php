<?php

route::post ( '/schemes', function ( )
{
    list ( $status, $payload ) = app::make ( 'i want to add a scheme' );
    return app::call ( status::match ( $status ), $payload );
} );