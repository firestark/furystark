<?php

namespace Scheme;

use Scheme;

interface Manager
{
    public function all(): Array;

    public function has($id): Bool;

    public function find($id): Scheme;

    public function add(Scheme $scheme);
}