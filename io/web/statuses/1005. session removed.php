<?php

status::matching ( 1005, function ( )
{
    sess::flash ( 'message', 'Session removed.' );
    return redirect::back ( );
} );