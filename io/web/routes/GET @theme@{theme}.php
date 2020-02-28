<?php

Route::get('/theme/{theme}', function($request, array $params) {
    Sess::set('theme', $params['theme']);
    return Redirect::back();
});