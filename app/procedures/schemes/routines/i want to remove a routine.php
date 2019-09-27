<?php

when ( 'i want to remove a routine', then ( apply ( a ( 
    
function ( scheme $scheme, scheme\routine $routine, scheme\manager $manager )
{
    $scheme->remove ( $routine );
    $manager->update ( $scheme );

    return [ 3004, [ 'id' => $scheme->id ] ];
} ) ) ) );