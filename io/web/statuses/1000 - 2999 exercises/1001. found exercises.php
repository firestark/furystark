<?php

use function compact as with;

status::matching ( 1001, function ( array $exercises )
{
    return view::make ( 'exercises.list', with ( 'exercises' ) );
} );