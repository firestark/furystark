<?php

$file = __DIR__ . '/../../storage/databases/files/aron/schemes.data';

$data = serialize ( [ 
    new scheme ( uniqid ( ), 'Chest' ),
    new scheme ( uniqid ( ), 'Legs' ),
    new scheme ( uniqid ( ), 'Shoulders' ),
    new scheme ( uniqid ( ), 'Back' ) 
] );

file_put_contents ( $file, $data );
