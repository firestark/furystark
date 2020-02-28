<?php

use function compact as with;

Status::matching(1006, function(Session $session) {
    $scheme = App::make(Scheme::class, ['id' => $session->scheme]);
    return View::make('session', with('session', 'scheme'));
});