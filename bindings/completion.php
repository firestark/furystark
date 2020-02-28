<?php

App::bind(Completion::class, function($app, Array $data) {
    return new Completion(
        $data['exercise'] ?? Input::get('exercise'),
        $data['set'] ?? Input::get('set'),
        $data['kg'] ?? Input::get('kg')
    );
});