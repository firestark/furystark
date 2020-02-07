<?php

namespace scheme;

use person;

interface manager
{
    function allFor ( person $person ) : array;
}