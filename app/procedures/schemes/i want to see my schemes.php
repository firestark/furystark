<?php

when ( 'i want to see my schemes', then ( apply ( a ( 
    
function ( scheme\manager $manager )
{
    return [ 3001, [ 'schemes' => $manager->all ( ) ] ];
} ) ) ) );