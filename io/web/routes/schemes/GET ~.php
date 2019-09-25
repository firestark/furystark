<?php

route::get ( '/schemes', function ( )
{
    list ( $status, $payload ) = app::make ( 'i want to see my schemes' );
    return app::call ( status::match ( $status ), $payload );
} );