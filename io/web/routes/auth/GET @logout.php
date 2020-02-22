<?php

route::get ( '/logout', function ( )
{
    guard::invalidate ( );
    
    sess::flash ( 'message', 'Successfully logged out.' );
    return redirect::to ( '/login' );
} );