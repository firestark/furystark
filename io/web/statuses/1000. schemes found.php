<?php

use function compact as with;

Status::matching(1000, function(array $schemes) {
    $person = App::make(person::class);
    return View::make('schemes', with('schemes', 'person'));
});