<?php

app::share ( exercise\manager::class, function ( )
{
    $file = __DIR__ . '/../../storage/databases/files/exercises.data';
    $exercises = unserialize ( file_get_contents ( $file ) );

    if ( ! is_array ( $exercises ) )
        $exercises = [ ];

    return new flatfileExerciseManager ( $file, $exercises );
} );