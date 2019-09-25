<?php

namespace user;

use user;

interface manager
{
    function add ( user $user );

    function has ( user $user ) : bool;

    function registered ( user $user ) : bool;

    function remove ( user $user );
}