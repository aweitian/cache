<?php
class RedisTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedis()
    {
    	//http://windows.php.net/downloads/pecl/releases/redis/2.2.7/
    	$cache = new Aw\Cache\Redis(array(
    			'host'     => '192.168.33.10',
    			'port'     => 6379,
    			'password' => '',
    			'database' => 0,
        ));
    	$cache->set('key', 'taw');
    	$this->assertEquals($cache->get('key'), 'taw');
    	$cache->set('balabala', 'balabala',1);
    	$this->assertEquals($cache->get('balabala'), 'balabala');
    	//echo "Sleep 1.5s ...\n";
    	sleep(1.5);
//     	print $cache->get('balabala');
    	$this->assertEquals($cache->get('balabala'), '');
    }
    public function testRedisArr()
    {
    	//http://windows.php.net/downloads/pecl/releases/redis/2.2.7/
    	$cache = new Aw\Cache\Redis(array(
    			'host'     => '192.168.33.10',
    			'port'     => 6379,
    			'password' => '',
    			'database' => 0,
        ));
    	$data = array(
    			'k1' => '123',
    			'ba' => 'balabala',
    			'arr' => array(2,54)
        );
    	//redis 不能直接存入PHP数组
    	$cache->set('key', json_encode($data) );
    	//$this->assertEquals($cache->get('key'), $data);
    }
}


