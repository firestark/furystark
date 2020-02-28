<?php

App::bind(completion::class, function($app, array $data) {
    return new completion(
        $data['exercise'] ?? Input::get('exercise'),
        $data['set'] ?? Input::get('set'),
        $data['kg'] ?? Input::get('kg')
    );
});