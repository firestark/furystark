<?php

use function compact as with;

when ( 'i want to see a session', then ( apply ( a ( 
    
function ( session $session, session\manager $manager )
{
    if ( ! $manager->has ( $session->id ) )
        return [ 2000, [ ] ];

    $session = $manager->find ( $session->id );
    return [ 1006, with ( 'session' ) ];
} ) ) ) );