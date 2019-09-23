<?php

when ( 'i want to see all exercises', then ( apply ( a ( 
    
function ( exercise\manager $manager )
{
    return [ 1001, [ 'exercises' => $manager->all ( ) ] ];
} ) ) ) );