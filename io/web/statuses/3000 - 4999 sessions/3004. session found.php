<?php

use function compact as with;

Status::matching(3004, function(Session $session) {
    $scheme = App::make(Scheme::class, ['schemeId' => $session->scheme]);
    return View::make('session', with('session', 'scheme'));
});