<?php

use function compact as with;

Status::matching(3002, function(Scheme $scheme, Array $sessions) {
    return View::make('schemes.view', with('scheme', 'sessions'));
});