<?php

status::matching ( 3003, function ( $id )
{
    session::flash ( 'message', 'Routine added.' );
    return redirect::to ( '/schemes/' . $id );
} );