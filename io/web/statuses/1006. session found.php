<?php

use function compact as with;

Status::matching(1006, function(session $session) {
    $scheme = App::make(scheme::class, ['id' => $session->scheme]);
    return View::make('session', with('session', 'scheme'));
});