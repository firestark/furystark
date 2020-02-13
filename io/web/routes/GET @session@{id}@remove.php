<?php

route::get ( '/session/{id}/remove', function ( )
{
    return app::fulfill ( 'i want to remove a scheme session' );
} );