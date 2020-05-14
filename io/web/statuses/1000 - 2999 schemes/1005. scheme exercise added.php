<?php

Status::matching(1005, function(Scheme $scheme) {
    Sess::flash('message', 'Exercise added.');
    return Redirect::to('/schemes/' . $scheme->id . '/exercises');
});