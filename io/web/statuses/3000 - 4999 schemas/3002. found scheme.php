<?php

use function compact as with;

status::matching ( 3002, function ( scheme $scheme )
{
    $exercises = app::make ( exercise\manager::class )->all ( );
    return view::make ( 'schemes.edit', with ( 'scheme', 'exercises' ) );
} );