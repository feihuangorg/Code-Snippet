<?php


require('./redis_cli.php');
var_dump(redis_cli::bitop('and', 'dest2',  array('key1', 'key2')));
var_dump(redis_cli::get('dest2'));


class redis_cli_test extends PHPUnit_Framework_TestCase
{
    public function test_server()
    {
        $this->assertEquals(true, redis_cli::flushdb());
        $this->assertEquals(true, redis_cli::flushall());
    }

    public function test_string()
    {
        $this->assertEquals(false, redis_cli::get(88888));
        $this->assertEquals(true, redis_cli::set(88888, 'hjkl;'));
        $this->assertEquals('hjkl;', redis_cli::get(88888));
        $this->assertEquals(5, redis_cli::strlen(88888));

        $this->assertEquals(false, redis_cli::get('bbb'));
        $this->assertEquals(true, redis_cli::set('bbb', 'dddqwert'));
        $this->assertEquals('dddqwert', redis_cli::get('bbb'));
        $this->assertEquals(8, redis_cli::strlen('bbb'));
    }
}


