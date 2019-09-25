<?php

route::get ( '/exercises/add', function ( )
{
    return view::make ( 'exercises.add' );
} );