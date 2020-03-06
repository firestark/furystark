<?php

use function compact as with;

Status::matching(1004, function(Scheme $scheme) {
    return View::make('schemes.exercises', with('scheme'));
});