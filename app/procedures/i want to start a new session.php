<?php

use function compact as with;

when ( 'i want to start a new session', then ( apply ( a ( 
    
function ( session\manager $manager, session $session )
{
    $manager->add ( $session );
    return [ 1001, with ( 'session' ) ];
} ) ) ) );