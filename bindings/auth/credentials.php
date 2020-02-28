<?php

App::bind('credentials', function($app): \Firestark\Credentials {
    if (Guard::stamped())
        return Guard::current();

    return new \Firestark\Credentials(
        Input::get('username', ''),
        Input::get('password', '')
    );
});