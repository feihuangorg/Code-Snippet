<?php 

/**
 * Auther: dingzhihao
 * Update: 2015-11-28
 *
 * A static redis library based on phpredis extension. And
 * all method in this library has the same behavior as the official Redis Commands,
 * except that use lowercase with method name.
 * 
 */



class my_redis
{
    private static $_redis;

    public static function instance()
    {
        if(self::$_redis instanceof Redis) {
            // do what you need here
            // ...
        } else {
            $redis_ip = '127.0.0.1';
            $redis_port = 6379;

            self::$_redis = new Redis();
            self::$_redis->pconnect($redis_ip, $redis_port);
        }

        return self::$_redis;
    }

    // ------------------------------------------------------------------------
    // database operation
    //
    // instead, return true in case of success, false in case of failure.
    public static function select($dbindex)
    {
        return self::instance()->select($dbindex);
    }

    // instead, always return true.
    public static function flushdb()
    {
        return self::instance()->flushDB();
    }


    // ------------------------------------------------------------------------
    // strings operation
    //
    // instead, if key didn't exist, false is returned. Otherwise, the value related to this key is returned.
    public static function get($key)
    {
        return self::instance()->get($key);
    }

    // instead, return true if the command is successful.
    public static function set($key, $value)
    {
        return self::instance()->set($key, $value);
    }



}

