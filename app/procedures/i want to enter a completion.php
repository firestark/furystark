<?php

when ( 'i want to enter a completion', then ( apply ( a ( 
    
function ( scheme\session $session, scheme\completion $completion )
{
    $session->add ( $completion );
} ) ) ) );