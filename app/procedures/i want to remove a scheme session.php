<?php

when ( 'i want to remove a scheme session', then ( apply ( a ( 
    
function ( session $session, session\manager $manager )
{
    $manager->remove ( $session );
    return [ 1005, [ ] ];
} ) ) ) );