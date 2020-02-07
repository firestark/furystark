<?php

use function compact as with;

status::matching ( 1001, function ( scheme $scheme )
{
    return view::make ( 'session', with ( 'scheme' ) );
} );