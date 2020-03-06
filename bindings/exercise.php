<?php

App::bind(Exercise::class, function($app, array $data) {
    $id = $data['id'] ?? uniqid();
    $name = $data['name'] ?? Input::get('exercise', '');
    $sets = $data['sets'] ?? Input::get('sets', 0);
    $reps = $data['reps'] ?? Input::get('reps', 0);

    return new Exercise($id, $name, (int) $sets, (int) $reps);
});