<?php

use function compact as with;

Route::post('/schemes', function() {
    return App::fulfill('i want to add a scheme', with('scheme'));
});