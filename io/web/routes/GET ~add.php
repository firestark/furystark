<?php

route::get ( '/add', function ( )
{
    return view::make ( 'exercises.add' );
} );