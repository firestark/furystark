<?php

app::bind ( completion::class, function ( )
{
    return new completion (
        input::get ( 'exercise' ),
        input::get ( 'kg' )
    );
} );