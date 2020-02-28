<?php

use function compact as with;

Status::matching(1004, function(Scheme $scheme, Array $sessions) {
    return View::make('scheme', with('scheme', 'sessions'));
});