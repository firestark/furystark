<?php

Status::matching(1010, function() {
    Sess::flash('message', 'Exercise added.');
    return Redirect::back();
});