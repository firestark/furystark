<?php

when('i want to add a scheme', then(apply(a(
    
function(Scheme $scheme, Scheme\Manager $manager) {
    $manager->add($scheme);
    return [1007, []];
}))));