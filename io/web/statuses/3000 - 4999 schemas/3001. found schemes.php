<?php

use function compact as with;

status::matching ( 3001, function ( array $schemes )
{
    return view::make ( 'schemes.list', with ( 'schemes' ) );
} );