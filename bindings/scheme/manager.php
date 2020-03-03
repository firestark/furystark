<?php

App::share(Scheme\Manager::class, function($app) {
    $person = strtolower($app[Person::class]->name);
    $file = __DIR__ . '/../../storage/databases/files/' . $person . '/schemes.data';
    return new FlatfileSchemeManager($file, $app['schemes']);
});