<?php

Status::matching(1003, function() {
    Sess::flash('message', 'Scheme removed.');
    return Redirect::to('/');
});