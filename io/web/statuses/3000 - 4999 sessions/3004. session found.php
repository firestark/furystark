<?php

use function compact as with;

Status::matching(3004, function(Session $session) {
    $scheme = App::make(Scheme\Manager::class)->find($session->scheme);
    return View::make('session', with('session', 'scheme'));
});