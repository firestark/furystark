<?php

App::bind(Scheme::class, function($app, Array $data = []) {
    $id = $data ['schemeId'] ?? Input::get('schemeId') ?? uniqid ();

    if ($app[Scheme\Manager::class]->has($id))
        return $app[Scheme\Manager::class]->find($id);

    return new Scheme (
        $id,
        $data['title'] ?? Input::get('title', ''),
        $data['exercises'] ?? []
    );
});