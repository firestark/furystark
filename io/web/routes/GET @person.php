<?php

Route::get('/person/{name}', function(string $name) {
    Sess::set('person', $name);
    return Redirect::to('/');
});