<?php

app::share ( scheme\manager::class, function ( )
{
    return new flatfileSchemeManager;
} );