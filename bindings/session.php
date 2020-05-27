<?php

App::bind(Session::class, function($app, array $data) {
    return new Session (
        uniqid(), 
        $data['scheme'],
        [] 
    );
});