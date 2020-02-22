<?php

use firestark\userManager;

app::share ( userManager::class, function ( $app )
{
    return new flatfileUserManager (
        $app [ 'users file' ],
        $app [ 'users' ] );
} );