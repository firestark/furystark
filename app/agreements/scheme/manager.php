<?php

namespace scheme;

use scheme;

interface manager
{
    function add ( scheme $scheme );

    function update ( scheme $scheme );

    function all ( ) : array;

    function find ( $id ) : scheme;
}