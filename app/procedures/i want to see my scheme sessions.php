<?php

use function compact as with;

when ( 'i want to see my scheme sessions', then ( apply ( a ( 
    
function ( scheme $scheme, session\manager $manager )
{
    $sessions = $manager->findBelongingTo ( $scheme );
    return [ 1004, with ( 'scheme', 'sessions' ) ];
} ) ) ) );