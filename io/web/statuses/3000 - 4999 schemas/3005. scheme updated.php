<?php

status::matching ( 3005, function ( )
{
    session::flash ( 'message', 'Scheme updated.' );
    return redirect::back ( );
} );