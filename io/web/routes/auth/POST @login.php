<?php

use firestark\userManager;

route::post ( '/login', function ( )
{
    $credentials = app::make ( 'credentials' );
    
    if ( ! app::make ( userManager::class )->has ( $credentials ) )
    {
        sess::flash ( 'message', 'Invalid credentials.' );
        return redirect::back ( );
    }

    guard::stamp ( $credentials );
    sess::flash ( 'message', 'Logged in.' );
    return redirect::to ( '/' );
} );