<?php

when('i want to remove a scheme exercise', then(apply(a(
    
function(Scheme $scheme, Exercise $exercise, Scheme\Manager $manager, Session\Manager $sessionManager) {
    $scheme->remove($exercise);
    $manager->update($scheme);

    foreach ($sessionManager->findBelongingTo($scheme) as $session) {
        $session->remove($exercise);
        $sessionManager->update($session);
    }

    return [1006, []];
}))));