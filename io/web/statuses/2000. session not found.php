<?php

Status::matching(2000, function() {
    Sess::flash('message', 'Session could not be found.');
    return Redirect::to('/');
});