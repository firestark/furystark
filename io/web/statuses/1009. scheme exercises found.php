<?php

use function compact as with;

Status::matching(1009, function(Scheme $scheme) {
    return View::make('schemes.exercises', with('scheme'));
});