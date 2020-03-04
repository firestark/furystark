<?php

when('i want to remove a scheme', then(apply(a(
    
function(Scheme $scheme, Scheme\Manager $manager) {
    $manager->remove($scheme);
    return [1008, []];
}))));