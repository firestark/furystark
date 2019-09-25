<?php

app::bind ( scheme\routine::class, function ( $app )
{
    return new scheme\routine ( 
        $app->make ( 'exercise' ),
        input::get ( 'sets', 0 ),
        input::get ( 'reps', 0 )
    );
} );