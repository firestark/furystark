<?php

Route::get('/schemes/{schemeId}/exercises', function() {
    return App::fulfill('i want to see a scheme\'s exercises');
});