<?php

use function compact as with;

Status::matching(1004, function(scheme $scheme, array $sessions) {
    $person = App::make(person::class);
    return View::make('scheme', with('scheme', 'sessions', 'person'));
});