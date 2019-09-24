<?php

use function compact as with;

route::get ( '/remove/{name}', function ( string $name )
{
    list ( $status, $payload ) = app::make ( 'i want to remove an exercise', with ( 'name' ) );
    return app::call ( status::match ( $status ), $payload );
} );