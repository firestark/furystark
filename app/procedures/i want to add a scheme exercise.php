<?php

when('i want to add a scheme exercise', then(apply(a(
    
function(Scheme $scheme, Exercise $exercise, Scheme\Manager $manager) {
    $scheme->add($exercise);
    $manager->update($scheme);

    return [1010, []];
}))));