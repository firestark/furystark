<?php

Status::matching(1002, function($id) {
    Sess::flash('message', 'Scheme added.');
    return Redirect::to('/schemes/' . $id . '/exercises');
});