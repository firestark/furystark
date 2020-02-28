<?php

namespace Firestark;

interface UserManager
{
    function register(Credentials $credentials);

    function has(Credentials $credentials): bool;

    function registered(string $username): bool;
}