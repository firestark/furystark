<?php

Status::matching(3003, function() {
    Sess::flash('message', 'Session removed.');
    return Redirect::back();
});