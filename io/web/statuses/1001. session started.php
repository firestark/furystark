<?php

use function compact as with;

status::matching ( 1001, function ( session $session )
{
    return redirect::to ( '/session/' . $session->id );
} );