<?php

App::bind(Scheme::class, function($app, Array $data = []) {
    $id = $data ['id'] ?? Input::get('id') ?? uniqid ();

    if ($app[Scheme\Manager::class]->has($id))
        return $app[Scheme\Manager::class]->find($id);

    return new Scheme (
        $id,
        ''
    );
});