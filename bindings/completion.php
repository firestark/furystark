<?php

app::bind ( completion::class, function ( $app, array $data )
{
    return new completion (
        $data [ 'exercise' ] ?? input::get ( 'exercise' ),
        $data [ 'set' ] ?? input::get ( 'set' ),
        $data [ 'kg' ] ?? input::get ( 'kg' )
    );
} );