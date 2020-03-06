<?php

use function compact as with;

Route::post('/schemes', function() {
    foreach (Input::get('exercise') as $data) {
        if (empty($data['name']) || empty($data['sets']) || empty($data['reps']))
            break;

        $exercises[] = App::make(Exercise::class, array_merge (['id' => uniqid()], $data));
    }

    $scheme = App::make(Scheme::class, ['exercises' => $exercises ?? []]);
    return App::fulfill('i want to add a scheme', with('scheme'));
});