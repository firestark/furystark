<?php

class flatfileSchemeManager implements scheme\manager
{
    function allFor ( person $person ) : array
    {
        return [ 
            new scheme ( uniqid ( ), 'Chest' ),
            new scheme ( uniqid ( ), 'Legs' ),
            new scheme ( uniqid ( ), 'Shoulders' ),
            new scheme ( uniqid ( ), 'Back' ) 
        ];
    }
}