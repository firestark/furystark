<?php

namespace session;

use session;
use scheme;

interface manager
{
    function add ( session $session );

    function has ( $id ) : bool;

    function find ( $id ) : session;

    function findBelongingTo ( scheme $scheme ) : array;

    function update ( session $session );

    function remove ( session $session );
}