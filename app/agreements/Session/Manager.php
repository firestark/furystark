<?php

namespace Session;

use Session;
use Scheme;

interface Manager
{
    public function add(Session $session);

    public function has($id): Bool;

    public function find($id): Session;

    public function findBelongingTo(Scheme $scheme): Array;

    public function update(Session $session);

    public function remove(Session $session);
}