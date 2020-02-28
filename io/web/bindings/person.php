<?php

App::share(Person::class, function($app) {
    return new Person($app['credentials']->username);
});