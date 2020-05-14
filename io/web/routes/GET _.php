<?php

Route::get('/', function() {
    Sess::flash('message', Sess::get('message'));
    return Redirect::to('/schemes');
});