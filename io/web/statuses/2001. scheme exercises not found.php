<?php

Status::matching(2001, function() {
    Sess::flash('message', 'Scheme exercises not found.');
    return Redirect::back();
});