<?php

App::share(person::class, function($app) {
    return new person($app['credentials']->name ?? 'Aron');
});