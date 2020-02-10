<?php

when ( 'i want to add a completion', then ( apply ( a ( 
    
function ( session\manager $manager, session $session, completion $completion )
{
    dd ( $completion );

    $session->add ( $completion );
    $manager->update ( $session );

    return [ 1003, [ ] ];
} ) ) ) );