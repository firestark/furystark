<?php

use function compact as with;

when('i want to see my scheme sessions', then(apply(a(
    
function(Scheme $scheme, Scheme\Manager $schemeManager, Session\Manager $manager) {

    if (! $schemeManager->has($scheme->id))
        return [ 4001, []];

    $sessions = $manager->findBelongingTo($scheme);
    return [3002, with('scheme', 'sessions')];
}))));