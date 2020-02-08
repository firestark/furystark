<?php

namespace scheme;

use scheme;

interface manager
{
    function all ( ) : array;

    function has ( $id ) : bool;

    function find ( $id ) : scheme;
}