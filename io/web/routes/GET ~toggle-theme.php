<?php

route::get ( '/toggle-theme', function ( )
{
    $new = ( session::get ( 'theme', 'light' ) === 'light' ) ? 'dark' : 'light';
    session::set ( 'theme', $new );
    return redirect::back ( );
} );