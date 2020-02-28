<?php

use function compact as with;

status::matching(1002, function(session $session) {
    $scheme = App::make(scheme::class, ['id' => $session->scheme]);
    return View::make ('session', with('session', 'scheme'));
});