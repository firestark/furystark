<?php

when('i want to remove a scheme exercise', then(apply(a(
    
function(Scheme $scheme, Exercise $exercise, Scheme\Manager $manager) {
    $scheme->remove($exercise);
    $manager->update($scheme);

    return [1006, []];
}))));