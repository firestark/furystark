<?php

namespace firestark;

interface userManager
{
    function register ( credentials $credentials );

    function has ( credentials $credentials ) : bool;

    function registered ( string $username ) : bool;
}