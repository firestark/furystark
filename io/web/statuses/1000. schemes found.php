<?php

use function compact as with;

status::matching ( 1000, function ( array $schemes )
{
    $person = app::make ( person::class );
    return view::make ( 'schemes', with ( 'schemes', 'person' ) );
} );