<?php

App::bind(Scheme::class, function($app, Array $data = []) {
    return new Scheme (
        uniqid(),
        $data['title'] ?? Input::get('title', ''),
        $data['exercises'] ?? []
    );
});