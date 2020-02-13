<?php

route::get ( '/{id}/start', function ( )
{
    return app::fulfill ( 'i want to start a new session' );
} );