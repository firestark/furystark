<?php

App::bind(Exercise::class, function($app, array $data) {
    $id = $data['id'] ?? uniqid();
    $name = $data['name'] ?? '';
    $sets = (int)$data['sets'] ?? 0;
    $reps = (int)$data['reps'] ?? 0;

    return new Exercise($id, $name, $sets, $reps);
});