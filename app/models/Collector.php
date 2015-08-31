<?php

class Collector
{

    public static $collection = null;


    public static function get($key)
    {
        if (isset(self::$collection[$key])) {
            return self::$collection[$key];
        }

        return null;
    }

    public static function set($key, $value)
    {
        self::$collection[$key] = $value;
    }
}
