<?php


require('./my_redis.php');

class my_redis_test extends PHPUnit_Framework_TestCase
{
    public function test_demo()
    {
        $this->assertEquals(true, my_redis::select(7));
        $this->assertEquals(true, my_redis::select(0));
        $this->assertEquals(false, my_redis::select(99999));

        $this->assertEquals(true, my_redis::flushdb());

        $this->assertEquals(false, my_redis::get(88888));
        $this->assertEquals(true, my_redis::set(88888, 'hjkl;'));
        $this->assertEquals('hjkl;', my_redis::get(88888));

        $this->assertEquals(false, my_redis::get('bbb'));
        $this->assertEquals(true, my_redis::set('bbb', 'qwert'));
        $this->assertEquals('qwert', my_redis::get('bbb'));
        
        
    }
}


