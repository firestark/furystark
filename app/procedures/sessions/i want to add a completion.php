<?php

use function compact as with;

when('i want to add a completion', then(apply(a( 
    
function (Session\Manager $manager, Session $session, Completion $completion) {
    $session->set($completion);
    $manager->update($session);

    return [3001, with('session')];
}))));