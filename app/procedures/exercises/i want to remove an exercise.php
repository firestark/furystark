<?php

when ( 'i want to remove an exercise', then ( apply ( a ( 
    
function ( string $name, exercise\manager $manager )
{
    $manager->remove ( $name );
    return [ 1002, [ ] ];
} ) ) ) );