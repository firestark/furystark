<?php

namespace exercise;

use exercise;

interface manager
{
    function has ( exercise $exercise ) : bool;

    function add ( exercise $exercise );

    function all ( ) : array;
}