<?php

status::matching ( 1002, function ( )
{
    session::flash ( 'message', 'Exercise removed.' );
    return redirect::back ( );
} );