<?php

app::bind ( scheme::class, function ( $app )
{
    return $app [ scheme\manager::class ]->find ( input::get ( 'id' ) );
} );