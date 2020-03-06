<?php

Status::matching(4000, function() {
    Sess::flash('message', 'Session could not be found.');
    return Redirect::to('/');
});