<?php

route::get ( '/theme/{theme}', function ( string $theme )
{
    sess::set ( 'theme', $theme );
} );