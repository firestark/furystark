<?php

Status::matching(1005, function() {
    Sess::flash('message', 'Session removed.');
    return Redirect::back();
});