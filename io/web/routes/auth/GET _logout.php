<?php

Route::get('/logout', function() {
    Guard::invalidate();
    
    Sess::unset('token');
    Sess::flash('message', 'Successfully logged out.');
    return Redirect::to('/login');
});