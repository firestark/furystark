<?php

app::share ( person::class, function ( )
{
    return new person ( input::get ( 'person', 'Aron' ) );
} );