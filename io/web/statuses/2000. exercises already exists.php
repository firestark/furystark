<?php

status::matching ( 2000, function ( )
{
    session::flash ( 'message', 'Exercise already exists.' );
    return redirect::to ( '/' );
} );