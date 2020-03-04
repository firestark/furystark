<?php

Status::matching(1008, function() {
    Sess::flash('message', 'Scheme removed.');
    return Redirect::to('/');
});