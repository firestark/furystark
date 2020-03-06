<?php

Status::matching(1011, function() {
    Sess::flash('message', 'Scheme exercise removed.');
    return Redirect::back();
});