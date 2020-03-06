<?php

use function compact as with;

Status::matching(3000, function(Session $session) {
    return Redirect::to('/session/' . $session->id);
});