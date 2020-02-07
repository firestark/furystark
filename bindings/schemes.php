<?php

app::share ( 'schemes', function ( )
{
    return [ 
        new scheme ( uniqid ( ), 'Chest' ),
        new scheme ( uniqid ( ), 'Legs' ),
        new scheme ( uniqid ( ), 'Shoulders' ),
        new scheme ( uniqid ( ), 'Back' ) 
    ];
} );