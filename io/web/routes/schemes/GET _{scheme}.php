<?php

Route::get('/{id}', function($request, $params) {
    return App::fulfill('i want to see my scheme sessions');
});