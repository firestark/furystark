<?php

status::matching ( 3004, function ( $id )
{
    session::flash ( 'message', 'Routine removed.' );
    return redirect::to ( '/schemes/' . $id );
} );