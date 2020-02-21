<?php

route::get ( '/login', function ( )
{
    return view::make ( 'login' );
} );