<?php

use function compact as with;

status::matching ( 1002, function ( session $session )
{
    $scheme = app::make ( scheme::class, [ 'id' => $session->scheme ] );

    $set = (int ) input::get ( 'set', 0 ) +1;
    $round = ( int ) input::get ( 'round', 0 );

    if ( $round === count ( $scheme->exercises ) )
        return redirect::to ( '/' );

    if ( $set > $scheme->exercises [ $round -1 ]->sets )
    {
        $set = 1;
        $round += 1;
    }

    $exercise = $scheme->exercises [ $round -1 ]->id;

    return view::make ( 'session', with ( 'session', 'scheme', 'exercise', 'round', 'set' ) );
} );