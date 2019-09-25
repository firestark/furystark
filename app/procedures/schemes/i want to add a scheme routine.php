<?php

when ( 'i want to add a scheme routine', then ( apply ( a ( 
    
function ( scheme $scheme, scheme\routine $routine, scheme\manager $manager )
{
    $scheme->add ( $routine );
    $manager->update ( $scheme );

    return [ 3003, [ ] ];
} ) ) ) );