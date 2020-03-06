<?php

Status::matching(2000, function() {
    Sess::flash('message', 'Scheme exercises not found.');
    return Redirect::back();
});