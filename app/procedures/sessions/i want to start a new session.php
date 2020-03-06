<?php

use function compact as with;

when('i want to start a new session', then(apply(a(
    
function (Session\Manager $manager, Session $session) {
    $manager->add($session);
    return [3000, with('session')];
}))));