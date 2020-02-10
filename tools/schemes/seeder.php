<?php

$aron = __DIR__ . '/../../storage/databases/files/aron/schemes.data';
$martijn = __DIR__ . '/../../storage/databases/files/martijn/schemes.data';

function data ( )
{
    $chest = [
        new exercise ( 'bench press', 4, 8 ),
        new exercise ( 'dumbbell press', 3, 10 ),
        new exercise ( 'dumbbell flys', 3, 10 )
    ];
    
    return serialize ( [ 
        new scheme ( uniqid ( ), 'Chest', $chest ),
        new scheme ( uniqid ( ), 'Legs' ),
        new scheme ( uniqid ( ), 'Shoulders' ),
        new scheme ( uniqid ( ), 'Back' ) 
    ] );
}

file_put_contents ( $aron, data ( ) );
file_put_contents ( $martijn, data ( ) );