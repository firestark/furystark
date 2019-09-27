<?php

use function compact as with;

route::get ( '/schemes/{id}/routines/add', function ( $id )
{
    $exercises = app::make ( exercise\manager::class )->all ( );
    return view::make ( 'schemes.routines.add', with ( 'id', 'exercises' ) );
} );