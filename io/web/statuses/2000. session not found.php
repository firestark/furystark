<?php

status::matching ( 2000, function ( )
{
    sess::flash ( 'message', 'Session could not be found.' );
    return redirect::to ( '/' );
} );