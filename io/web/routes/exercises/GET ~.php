<?php

route::get ( '/exercises', function ( )
{
    list ( $status, $payload ) =  app::make ( 'i want to see all exercises' );
    return app::call ( status::match ( $status ), $payload );
} );