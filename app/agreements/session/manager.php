<?php

namespace session;

use session;

interface manager
{
    function add ( session $session );

    function has ( $id ) : bool;

    function find ( $id ) : session;
}