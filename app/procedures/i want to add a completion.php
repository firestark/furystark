<?php

use function compact as with;

when ( 'i want to add a completion', then ( apply ( a ( 
    
function ( session\manager $manager, session $session, completion $completion )
{
    $session->set ( $completion );
    $manager->update ( $session );

    return [ 1002, with ( 'session' ) ];
} ) ) ) );