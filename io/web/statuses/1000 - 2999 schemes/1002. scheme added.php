<?php

Status::matching(1002, function() {
    Sess::flash('message', 'Scheme added.');
    return Redirect::to('/');
});