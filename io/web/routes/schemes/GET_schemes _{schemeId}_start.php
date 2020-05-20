<?php

Route::get('/schemes/{schemeId}/start', function() {
    return App::fulfill('i want to start a new session');
});