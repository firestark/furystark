<?php

use function compact as with;

Route::get('/schemes/{schemeId}', function($request, array $parameters) {
    if (! App::make(Scheme\Manager::class)->has($parameters['schemeId']))
    {
        Sess::flash('message', 'Scheme not found.');
        return Redirect::back();
    }


    $scheme = App::make(Scheme\Manager::class)->find($parameters['schemeId']);
    return App::fulfill('i want to see my scheme sessions', with('scheme'));
});