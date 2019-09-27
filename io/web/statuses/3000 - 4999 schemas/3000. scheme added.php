<?php

status::matching ( 3000, function ( )
{
    session::flash ( 'message', 'Scheme added.' );
    return redirect::to ( '/schemes' );
} );