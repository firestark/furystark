<?php

App::bind(session::class, function($app, array $data) {
    if (isset($data['id']) && $app[session\manager::class]->has($data['id']))
        return $app[session\manager::class]->find($data['id']);

    if ($app[session\manager::class]->has(Input::get('id')))
        return $app[session\manager::class]->find(Input::get('id'));

    return new session (
        uniqid(), 
        $app[scheme::class], 
        [] 
    );
} );