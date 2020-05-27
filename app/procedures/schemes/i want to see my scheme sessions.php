<?php

use function compact as with;

when('i want to see my scheme sessions', then(apply(a(
    
function(Scheme $scheme, Session\Manager $manager) {
    $sessions = $manager->findBelongingTo($scheme);
    return [3002, with('scheme', 'sessions')];
}))));