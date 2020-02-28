<?php

use function compact as with;

Status::matching(1000, function(array $schemes) {
    return View::make('schemes', with('schemes'));
});