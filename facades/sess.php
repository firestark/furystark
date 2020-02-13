<?php

class sess extends facade
{
    public static function getFacadeAccessor ( )
    {
        return 'firestark\session';
    }
}
