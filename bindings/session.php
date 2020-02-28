<?php

App::bind(Session::class, function($app, array $data) {
    if (isset($data['id']) && $app[Session\Manager::class]->has($data['id']))
        return $app[Session\Manager::class]->find($data['id']);

    if ($app[Session\Manager::class]->has(Input::get('id')))
        return $app[Session\Manager::class]->find(Input::get('id'));

    return new Session (
        uniqid(), 
        $app[Scheme::class], 
        [] 
    );
});