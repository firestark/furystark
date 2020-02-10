<?php

app::bind ( session::class, function ( $app )
{
    return new session ( uniqid ( ), $app [ scheme::class ], [ ] );
} );