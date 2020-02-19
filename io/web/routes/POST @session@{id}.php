<?php

use function compact as with;

route::post ( '/session/{id}', function ( )
{
    foreach ( input::get ( 'exercises' ) as $exercise => $sets )
        foreach ( $sets as $set => $kg )
        {
            if ( empty ( $kg ) )
                break;
                
            $completion = app::make ( completion::class, with ( 'exercise', 'kg' ) );
            app::fulfill ( 'i want to add a completion', with ( 'completion', 'set' ) );
        }

    sess::flash ( 'message', 'Session saved.' );
    return redirect::to ( '/' );
} );