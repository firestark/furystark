<?php

use function compact as with;

status::matching ( 1004, function ( scheme $scheme, array $sessions )
{
    $person = app::make ( person::class );
    return view::make ( 'scheme', with ( 'scheme', 'sessions', 'person' ) );
} );