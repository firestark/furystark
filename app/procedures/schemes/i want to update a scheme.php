<?php

when ( 'i want to update a scheme', then ( apply ( a ( 
    
function ( scheme $scheme, scheme\manager $manager )
{
    $manager->update ( $scheme );
    return [ 3005, [ ] ];
} ) ) ) );