<?php

use function compact as with;

status::matching ( 3002, function ( scheme $scheme )
{
    return view::make ( 'schemes.edit', with ( 'scheme' ) );
} );