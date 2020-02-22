<?php

use firestark\credentials;

$file = __DIR__ . '/../../storage/databases/files/users.data';

function data ( )
{
    $credentials = [ 
        'aron' => new credentials ( 'aron', 'koek' ),
        'martijn' => new credentials ( 'martijn', 'koek' ),
    ];
    
    return serialize (
        $credentials
    );
}

file_put_contents ( $file, data ( ) );
