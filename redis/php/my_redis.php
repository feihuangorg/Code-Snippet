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
            self::$_redis = new Redis();
            
            // get the config setting
            $redis_ip = '127.0.0.1';
            $redis_port = 6379;

            // connection setting
            self::$_redis->pconnect($redis_ip, $redis_port);
            // also, we can do more, like
            // self::$_redis->auth('passwd');
            // self::$_redis->select(7); // select database
            // self::$_redis->ping(); // this will return string '+PONG', or RedisException object on connectivity error.
            // ...

            // server setting, like
            // self::$_redis->config("GET", "*max-*-entries*");
            // self::$_redis->config("set", "dir", "/var/run/redis/dumps/");
            // self::$_redis->slaveof('10.0.1.7', 6379);
            // ...
        }

        return self::$_redis;
    }

    // ------------------------------------------------------------------------
    // server
    //
    // Instead, always return true.
    public static function flushall()
    {
        return self::instance()->flushAll();
    }
    // Instead, always return true.
    public static function flushdb()
    {
        return self::instance()->flushDB();
    }
    // Return the number of keys in selected database
    public static function dbsize()
    {
        return self::instance()->dbSize();
    }
    // Return true in case of success, false in case of failure.
    // If a save is already running, this command will fail and return false.
    public static function save()
    {
        return self::instance()->save();
    }
    // Get information and statistics about the server
    public static function info($section='')
    {
        if(empty($section))
            return self::instance()->info();
        else
            return self::instance()->info($section);
    }


    // ====================================================================
    // generic
    // --------------------------------------------------------------------
    // Instead, return the following value
    //      - string: Redis::REDIS_STRING
    //      - set: Redis::REDIS_SET
    //      - list: Redis::REDIS_LIST
    //      - zset: Redis::REDIS_ZSET
    //      - hash: Redis::REDIS_HASH
    //      - other: Redis::REDIS_NOT_FOUND 
    public static function type($key)
    {
        return self::instance()->type($key);
    }
    // Instead, return an array of keys matching pattern
    public static function keys($patten)
    {
        return self::instance()->keys($patten);
    }
    // Instead, return the number of keys deleted.
    public static function del($keys_array)
    {
        return self::instance()->delete($keys_array);
    }
    // Instead, return true if the key exists, otherwise return false
    public static function exists($key)
    {
        return self::instance()->exists($key);
    }
    // Instead, return an existing key in redis
    public static function randomkey()
    {
        return self::instance()->randomKey();
    }
    // Instead, return true in case of success, false in case of failure
    public static function rename($key, $newkey)
    {
        return self::instance()->renameKey($key, $newkey);
    }
    // Instead, return same as rename, but will not replace a key if the destination already exists
    public static function renamenx($key, $newkey)
    {
        return self::instance()->renameNx($key, $newkey);
    }

    // --------------------------------------------------------------------
    // Instead, return true in case of success, false in case of failure
    public static function expire($key, $seconds)
    {
        return self::instance()->setTimeout($key, $seconds);
    }
    // Instead, return true in case of success, false in case of failure
    public static function expireat($key, $timestamp)
    {
        return self::instance()->expireAt($key, $timestamp);
    }
    // Instead, return the time to live in seconds. If the key has no ttl, -1 will be returned, and -2 if the key doesn't exist.
    public static function ttl($key)
    {
        return self::instance()->ttl($key);
    }
    // Instead, return true in case of success, false in case of failure
    public static function pexpire($key, $milliseconds)
    {
        return self::instance()->pexpire($key, $milliseconds);
    }
    // Instead, return true in case of success, false in case of failure
    public static function pexpireat($key, $milliseconds_timestamp)
    {
        return self::instance()->pexpireAt($key, $milliseconds_timestamp);
    }
    // Instead, return The time to live in milliseconds. If the key has no ttl, -1 will be returned, and -2 if the key doesn't exist.
    public static function pttl($key)
    {
        return self::instance()->pttl($key);
    }
    // Instead, return true if a timeout was removed, false if the key didn’t exist or didn’t have an expiration timer
    public static function persist($key)
    {
        return self::instance()->persist($key);
    }

    // --------------------------------------------------------------------
    // Instead, $iterator, an reference and need initialized to null.
    public static function scan($iterator, $patten='*', $count=10)
    {
        return self::instance()->scan($iterator, $patten, $count);
    }
    // Instead, $options_array with the following keys and values
    //      'by' => 'some_pattern_*',
    //      'limit' => array(0, 1),
    //      'get' => 'some_other_pattern_*' or an array of patterns,
    //      'sort' => 'asc' or 'desc',
    //      'alpha' => TRUE,
    //      'store' => 'external-key'
    // And return an array of values, or a number corresponding to the number of elements stored if that was used
    public static function sort($key, $options_array=array())
    {
        if(empty($options_array))
            return self::instance()->sort($key);
        else
            return self::instance()->sort($key, $options_array);
    }



    // ====================================================================
    // string
    // --------------------------------------------------------------------
    // Instead, return false if key didn't exist. Otherwise, return the value related to this key
    public static function get($key)
    {
        return self::instance()->get($key);
    }
    // Instead, return array containing the values related to keys in argument
    public static function mget($keys_array)
    {
        return self::instance()->mGet($keys_array);
    }
    // Instead, return the previous value located at this key
    public static function getset($key, $value)
    {
        return self::instance()->getSet($key, $value);
    }
    // Instead, return true if the command is successful.
    public static function set($key, $value)
    {
        return self::instance()->set($key, $value);
    }
    // Instead, return true in case of success, false in case of failure
    public static function mset($kvs_array)
    {
        return self::instance()->mset($kvs_array);
    }
    // Instead, return true in case of success, false in case of failure
    public static function setnx($key, $value)
    {
        return self::instance()->setnx($key, $value);
    }
    // Instead, return true in case of success, false in case of failure
    public static function msetnx($kvs_array)
    {
        return self::instance()->msetnx($kvs_array);
    }
    // Instead, return true if the command is successful.
    public static function setex($key, $seconds, $value)
    {
        return self::instance()->setex($key, $seconds, $value);
    }
    // Instead, return true if the command is successful.
    public static function psetex($key, $milliseconds, $value)
    {
        return self::instance()->psetex($key, $milliseconds, $value);
    }

    // --------------------------------------------------------------------
    // Instead, return the length of the string after the append operation
    public static function append($key, $value)
    {
        return self::instance()->append($key, $value);
    }
    // Instead, return the substring
    public static function getrange($key, $start, $end)
    {
        return self::instance()->getRange($key, $start, $end);
    }
    // Instead, return the length of the string after it was modified by the command
    public static function setrange($key, $offset, $value)
    {
        return self::instance()->setRange($key, $offset, $value);
    }
    // Instead, return the length of the string at key
    public static function strlen($key)
    {
        return self::instance()->strlen($key);
    }

    // --------------------------------------------------------------------
    // Instead, return the new value
    public static function incr($key)
    {
        return self::instance()->incr($key);
    }
    // Instead, return the new value
    public static function incrby($key, $increment)
    {
        return self::instance()->incrBy($key, $increment);
    }
    // Instead, the new value
    public static function incrbyfloat($key, $increment)
    {
        return self::instance()->incrByFloat($key, $increment);
    }
    // Instead, return the new value
    public static function decr($key)
    {
        return self::instance()->decr($key);
    }
    // Instead, return the new value
    public static function decrby($key, $decrement)
    {
        return self::instance()->decrBy($key, $decrement);
    }

    // --------------------------------------------------------------------
    // Instead, return the number of bits set to 1
    public static function bitcount($key, $start=0, $end=-1)
    {
        return self::instance()->bitcount($key, $start, $end);
    }
    // Instead, return the size of the string stored in the destination key,
    // that is equal to the size of the longest input string.
    public static function bitop($operation, $destkey, $keys_array)
    {
        $the_keys = '';
        foreach($keys_array as $k)
            $this_keys .= ",{$k}";
        $the_keys = ltrim($the_keys);

        return self::instance()->bitop($operation, $destkey, $the_keys);
    }
    // Instead, returns the position of the first bit set to 1 or 0 according to the request
    public static function bitpos($key, $bit, $start=0, $end=-1)
    {
        return self::instance()->bitpos($key, $bit, $start, $end);
    }
    // Instead, return the bit value (0 or 1)
    public static function getbit($key, $offset)
    {
        return self::instance()->getBit($key, $offset);
    }
    // Instead, return the value (0 or 1) of the bit before it was set
    public static function setbit($key, $offset, $value)
    {
        return self::instance()->setBit($key, $offset, $value);
    }


    // ====================================================================
    // hash
    // --------------------------------------------------------------------
    // Instead, return true in case of success, false in case of failure
    public static function hdel($key, $field)
    {
        return self::instance()->hDel($key, $field);
    }
    // Instead, return true if the member exists in the hash table, otherwise return false
    public static function hexists($key, $field)
    {
        return self::instance()->hExists($key, $field);
    }
    // Instead, return an array of fields in the hash
    public static function hkeys($key)
    {
        return self::instance()->hKeys($key);
    }
    // Instead, return an array of values in the hash
    public static function hvals($key)
    {
        return self::instance()->hVals($key);
    }
    // Instead, return 
    //      - number of fields in the hash, or
    //      - false when key does not exist or isn't a hash
    public static function hlen($key)
    {
        return self::instance()->hLen($key);
    }
    // Instead, $iterator, an reference and need initialized to null.
    // And, return an array of members that match our pattern.
    public static function hscan($key, $iterator, $patten='*', $count=10)
    {
        return self::instance()->hscan($key, $iterator, $patten, $count);
    }

    // --------------------------------------------------------------------
    // Instead, return an array of fields and their values stored in the hash
    public static function hgetall($key)
    {
        return self::instance()->hGetAll($key);
    }
    // Instead, return 
    //      - the value associated with field, or
    //      - false when field is not present in the hash or key does not exist
    public static function hget($key, $field)
    {
        return self::instance()->hGet($key, $field);
    }
    // Instead, return an array of values associated with the given fields, in the same order as they are requested.
    public static function hmget($key, $fields_array)
    {
        return self::instance()->hMget($key, $fields_array);
    }
    // Instead, return
    //      - 1: if field is a new field in the hash and value was set,
    //      - 0: if field already exists in the hash and the value was updated,
    //      - false: if there was an error. 
    public static function hset($key, $field, $value)
    {
        return self::instance()->hSet($key, $field, $value);
    }
    // Instead, return true or false
    public static function hmset($key, $fvs_array)
    {
        return self::instance()->hMset($key, $fvs_array);
    }
    // Instead, return
    //      - true: if field is a new field in the hash and value was set,
    //      - false: if field already exists in the hash and no operation was performed.
    public static function hsetnx($key, $field, $value)
    {
        return self::instance()->hSetNx($key, $field, $value);
    }

    // --------------------------------------------------------------------
    // Instead, return the value at field after the increment operation
    public static function hincrby($key, $field, $increment)
    {
        return self::instance()->hIncrBy($key, $field, $increment);
    }
    // Instead, return the value of field after the increment operation
    public static function hincrbyfloat($key, $field, $increment)
    {
        return self::instance()->hIncrByFloat($key, $field, $increment);
    }
    

    // ====================================================================
    //

}

