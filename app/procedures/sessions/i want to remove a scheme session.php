<?php

when('i want to remove a scheme session', then(apply(a(
    
function (Session $session, Session\Manager $manager) {
    $manager->remove($session);
    return [3003, []];
}))));