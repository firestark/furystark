<?php

Route::get('/session/{id}', function() {
    return App::fulfill('i want to see a session');
});