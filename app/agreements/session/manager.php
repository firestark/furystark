<?php

namespace session;

use session;
use scheme;

interface manager
{
    function add ( session $session );

    function has ( $id ) : bool;

    function find ( $id ) : session;

    function update ( session $session );

    function findBelongingTo ( scheme $scheme ) : array;
}