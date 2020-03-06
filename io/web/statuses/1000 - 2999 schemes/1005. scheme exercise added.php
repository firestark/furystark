<?php

Status::matching(1005, function() {
    Sess::flash('message', 'Exercise added.');
    return Redirect::back();
});