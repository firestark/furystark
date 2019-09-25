<?php

status::matching ( 1000, function ( )
{
    session::flash ( 'message', 'Exercises added.' );
    return redirect::to ( '/exercises' );
} );