<?php

app::share ( 'guard', function ( $app ) : \firestark\guard
{
    return new jwtSessionGuard (
        $app [ 'firestark\session' ] 
    );
} );