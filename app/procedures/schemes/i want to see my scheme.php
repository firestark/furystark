<?php

use function compact as with;

when ( 'i want to see my scheme', then ( apply ( a ( 
    
function ( scheme $scheme )
{
    return [ 3002, with ( 'scheme' ) ];
} ) ) ) );