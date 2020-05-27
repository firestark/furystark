<?php

use function compact as with;

when('i want to start a new session', then(apply(a(
    
function (Session $session, Session\Manager $manager) {
    $manager->add($session);
    return [3000, with('session')];
}))));