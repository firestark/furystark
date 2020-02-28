<?php

App::share(Session\Manager::class, function($app) {
    $person = strtolower($app[Person::class]->name);
    $file = __DIR__ . '/../../storage/databases/files/' . $person . '/sessions.data';

    $sessions = unserialize(file_get_contents($file));

    if (! is_array($sessions))
        $sessions = [];

    return new FlatfileSessionManager($file, $sessions);
});