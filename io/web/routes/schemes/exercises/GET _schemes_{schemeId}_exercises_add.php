<?php

Route::get('/schemes/{schemeId}/exercises/add', function($test, $params) {
    return View::make('schemes.exercises.add', $params);
});