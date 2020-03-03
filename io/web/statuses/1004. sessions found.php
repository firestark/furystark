<?php

use function compact as with;

Status::matching(1004, function(Scheme $scheme, Array $sessions) {
    return View::make('schemes.view', with('scheme', 'sessions'));
});