<?php

use function compact as with;

Route::post('/session/{sessionId}', function($request, array $parameters) {
    if(! App::make(Session\Manager::class)->has($parameters['sessionId']))
    {
        Sess::flash('message', 'Session not found.');
        return Redirect::back();
    }
    $session = App::make(Session\Manager::class)->find($parameters['sessionId']);


    foreach (Input::get('exercises') as $exercise => $sets)
        foreach ($sets as $set => $kg)
        {
            if (empty($kg))
                break;
                
            $completion = App::make(Completion::class, with('exercise', 'set', 'kg'));
            App::fulfill('i want to add a completion', with('session', 'completion'));
        }

    Sess::flash('message', 'Session saved.');
    return Redirect::back();
});