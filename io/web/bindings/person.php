<?php

app::share ( person::class, function ( )
{
    return new person ( sess::get ( 'person', 'Aron' ) );
} );