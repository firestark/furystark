<?php

use function compact as with;

Status::matching(1001, function(session $session) {
    $person = App::make(person::class);
    return Redirect::to('/session/' . $session->id);
});