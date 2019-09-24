<?php

app::bind ( exercise::class, function ( )
{
    return new exercise ( input::get ( 'name' ) );
} );