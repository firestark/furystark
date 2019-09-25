<?php

when ( 'i want to add a scheme', then ( apply ( a ( 
    
function ( scheme $scheme, scheme\manager $manager )
{
    $manager->add ( $scheme );
    return [ 3000, [ ] ];
} ) ) ) );