<?php

use function compact as with;

Status::matching(1000, function(Array $schemes) {
    return View::make('schemes', with('schemes'));
});