<?php

Status::matching(1006, function() {
    Sess::flash('message', 'Scheme exercise removed.');
    return Redirect::back();
});