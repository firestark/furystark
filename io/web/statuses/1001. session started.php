<?php

use function compact as with;

status::matching ( 1001, function ( session $session )
{
    $person = app::make ( person::class );
    return redirect::to ( '/session/' . $session->id );
} );