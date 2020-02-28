<?php

App::share('schemes', function($app) {
    $person = strtolower($app[Person::class]->name);
    $file = __DIR__ . '/../storage/databases/files/' . $person . '/schemes.data';

    $schemes = unserialize(file_get_contents($file));

    return (is_array($schemes)) ? $schemes : [];
} );