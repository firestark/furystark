<?php

Route::get('/{id}/start', function() {
    return App::fulfill('i want to start a new session');
});