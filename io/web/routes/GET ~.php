<?php

route::get ( '/', function ( )
{
    return redirect::to ( '/exercises' );
} );