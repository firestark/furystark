<?php

use function compact as with;

when('i want to see a session', then(apply(a(
    
function (Session $session, Session\Manager $manager) {
    if (! $manager->has($session->id))
        return [4000, []];

    $session = $manager->find($session->id);
    return [3004, with('session')];
}))));