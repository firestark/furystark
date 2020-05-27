<?php

use function compact as with;

Route::get('/session/{sessionId}/remove', function($request, array $parameters) {
    if(! App::make(Session\Manager::class)->has($parameters['sessionId']))
    {
        Sess::flash('message', 'Session not found.');
        return Redirect::back();
    }

    $session = App::make(Session\Manager::class)->find($parameters['sessionId']);
    return App::fulfill('i want to remove a scheme session', with('session'));
});