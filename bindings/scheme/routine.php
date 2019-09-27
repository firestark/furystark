<?php

app::bind ( scheme\routine::class, function ( $app )
{
    if ( input::has ( 'id' ) and input::has ( 'routine_id' ) )
        return $app [ scheme\manager::class ]->find ( input::get ( 'id' ) )->routines [ input::get ( 'routine_id' ) ];


    $exercise = $app [ exercise\manager::class ]->find ( input::get ( 'exercise' ) );

    return new scheme\routine (
        uniqid ( ),
        $exercise,
        input::get ( 'sets', 0 ),
        input::get ( 'reps', 0 )
    );
} );