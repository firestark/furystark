<?php

app::bind ( scheme\routine::class, function ( $app )
{
    $exercise = $app [ exercise\manager::class ]->find ( input::get ( 'exercise' ) );

    return new scheme\routine (
        uniqid ( ),
        $exercise,
        input::get ( 'sets', 0 ),
        input::get ( 'reps', 0 )
    );
} );