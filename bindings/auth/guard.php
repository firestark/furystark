<?php

App::share('guard', function($app): \Firestark\Guard {
    return new JwtGuard(
        $app['sess']->get('token', '')
    );
});