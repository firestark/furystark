<?php

route::get ( '/person/{name}', function ( string $name )
{
    sess::set ( 'person', $name );
    return redirect::to ( '/' );
} );