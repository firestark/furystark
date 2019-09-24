<?php

route::post ( '/', function ( )
{
    list ( $status, $payload ) = app::make ( 'i want to add an exercise' );
    return app::call ( status::match ( $status ), $payload );
} );