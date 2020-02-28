<?php

use Firestark\UserManager;

App::share(UserManager::class, function($app): UserManager {
    return new FlatfileUserManager(
        $app['users file'],
        $app['users']
    );
});