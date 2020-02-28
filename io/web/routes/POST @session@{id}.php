<?php

use function compact as with;

Route::post('/session/{id}', function() {
    foreach (Input::get('exercises') as $exercise => $sets)
        foreach ($sets as $set => $kg)
        {
            if (empty($kg))
                break;
                
            $completion = App::make(Completion::class, with('exercise', 'set', 'kg'));
            App::fulfill('i want to add a completion', with('completion'));
        }

    Sess::flash('message', 'Session saved.');
    return Redirect::back();
});