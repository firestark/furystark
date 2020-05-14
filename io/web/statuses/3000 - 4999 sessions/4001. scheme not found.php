<?php

Status::matching(4001, function() {
    Sess::flash('message', 'Scheme not found.');
    return Redirect::to('/');
});