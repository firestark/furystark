<?php

use function compact as with;

Route::post('/schemes/{schemeId}/exercises', function($request, array $parameters) {
    if (! App::make(Scheme\Manager::class)->has($parameters['schemeId']))
    {
        Sess::flash('message', 'Scheme not found.');
        return Redirect::to('/schemes');
    }

    $scheme = App::make(Scheme\Manager::class)->find($parameters['schemeId']);
    return App::fulfill('i want to add a scheme exercise', with('scheme'));
});