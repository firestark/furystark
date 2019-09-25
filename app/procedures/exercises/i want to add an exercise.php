<?php

when ( 'i want to add an exercise', then ( apply ( a ( 
    
function ( exercise $exercise, exercise\manager $manager )
{
    if ( $manager->has ( $exercise ) )
        return [ 2000, [ ] ];

    $manager->add ( $exercise );
    return [ 1000, [ ] ];
} ) ) ) );