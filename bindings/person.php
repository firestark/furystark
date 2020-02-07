<?php

app::share ( person::class, function ( )
{
    return new person ( 'Aron' );
} );