<?php

route::get ( '/session/{id}', function ( )
{
    return app::fulfill ( 'i want to see a session' );
} );