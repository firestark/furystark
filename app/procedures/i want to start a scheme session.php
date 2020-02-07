<?php

use function compact as with;

when ( 'i want to start a scheme session', then ( apply ( a ( 
    
function ( scheme $scheme )
{
    return [ 1001, with ( 'scheme' ) ];
} ) ) ) );