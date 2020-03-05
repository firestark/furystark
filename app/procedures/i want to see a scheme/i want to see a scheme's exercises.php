<?php

use function compact as with;

when('i want to see a scheme\'s exercises', then(apply(a(
    
function(Scheme $scheme, Scheme\Manager $manager) {
    if (! $manager->has($scheme->id))
        return [2001, []];

    $scheme = $manager->find($scheme->id);
    return [1009, with('scheme')];
}))));