<?php

use function compact as with;

when ( 'i want to see my schemes', then ( apply ( a ( 
    
function ( scheme\manager $manager, person $person )
{
    $schemes = $manager->allFor ( $person );
    return [ 1000, with ( 'schemes' ) ];
} ) ) ) );