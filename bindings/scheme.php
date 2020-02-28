<?php

App::bind(scheme::class, function($app, array $data = []) {
    $id = $data ['id'] ?? Input::get('id') ?? uniqid ();

    if ($app[scheme\manager::class]->has($id))
        return $app[scheme\manager::class]->find($id);

    return new scheme (
        $id,
        ''
    );
});