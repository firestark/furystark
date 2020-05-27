<?php

Route::get('/schemes/{schemeId}/exercises/add', function($request, $params) {
    return View::make('schemes.exercises.add', $params);
});