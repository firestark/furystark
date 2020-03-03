<?php

use function compact as with;

Route::post('/schemes', function() {
    foreach (Input::get('exercise') as $data) {
        if ( empty($data['name']) || empty($data['sets']) || empty($data['reps']))
            break;

        $exercises[] = App::make(Exercise::class, $data);
    }

    dd($exercises ?? []);
});