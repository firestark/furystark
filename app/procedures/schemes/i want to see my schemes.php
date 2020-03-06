<?php

use function compact as with;

when('i want to see my schemes', then(apply(a(
    
function (Scheme\Manager $manager, Person $person) {
    $schemes = $manager->all($person);
    return [1000, with('schemes')];
}))));