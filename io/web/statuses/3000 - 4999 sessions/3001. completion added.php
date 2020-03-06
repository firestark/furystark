<?php

use function compact as with;

status::matching(3001, function(Session $session) {
    $scheme = App::make(Scheme::class, ['id' => $session->scheme]);
    return View::make ('session', with('session', 'scheme'));
});