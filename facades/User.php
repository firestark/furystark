<?php

class User extends Facade
{
    public static function getFacadeAccessor()
    {
        return Person::class;
    }
}
