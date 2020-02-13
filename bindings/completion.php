<?php

app::bind ( completion::class, function ( $app, array $data )
{
    return new completion (
        $data [ 'exercise' ] ?? input::get ( 'exercise' ),
        $data [ 'kg' ] ?? input::get ( 'kg' )
    );
} );