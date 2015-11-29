<?php


require('./my_redis.php');
// var_dump(my_redis::get('aaaa'));
// var_dump(my_redis::set('aaaa', 'dingzhihao'));
// var_dump(my_redis::get('aaaa'));
// var_dump(my_redis::strlen('aaaa'));


class my_redis_test extends PHPUnit_Framework_TestCase
{
    public function test_server()
    {
        $this->assertEquals(true, my_redis::flushdb());
        $this->assertEquals(true, my_redis::flushall());
    }

    public function test_string()
    {
        $this->assertEquals(false, my_redis::get(88888));
        $this->assertEquals(true, my_redis::set(88888, 'hjkl;'));
        $this->assertEquals('hjkl;', my_redis::get(88888));
        $this->assertEquals(5, my_redis::strlen(88888));

        $this->assertEquals(false, my_redis::get('bbb'));
        $this->assertEquals(true, my_redis::set('bbb', 'dddqwert'));
        $this->assertEquals('dddqwert', my_redis::get('bbb'));
        $this->assertEquals(8, my_redis::strlen('bbb'));
    }
}


