<?php

Status::matching(1007, function() {
    Sess::flash('message', 'Scheme added.');
    return Redirect::to('/');
});