<?php

use function compact as with;

Route::get('/schemes/{schemeId}/start', function($request, array $parameters) {

    if (! App::make(Scheme\Manager::class)->has($parameters['schemeId']))
    {
        Sess::flash('message', 'Scheme not found.');
        return redirect::back();
    }


    $scheme = App::make(Scheme\Manager::class)->find($parameters['schemeId']);
    $session = App::make(Session::class, with('scheme'));

    return App::fulfill('i want to start a new session', with('session'));
});