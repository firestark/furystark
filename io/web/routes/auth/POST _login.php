<?php

use Firestark\UserManager;

Route::post( '/login', function() {
    $credentials = App::make('credentials');
    
    if (! App::make(UserManager::class)->has($credentials))
    {
        Sess::flash('message', 'Invalid credentials.');
        return Redirect::back();
    }

    Sess::set('token', Guard::stamp($credentials));
    Sess::flash('message', 'Logged in.');
    return Redirect::to('/');
});