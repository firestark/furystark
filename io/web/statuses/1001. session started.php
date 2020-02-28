<?php

use function compact as with;

Status::matching(1001, function(Session $session) {
    return Redirect::to('/session/' . $session->id);
});