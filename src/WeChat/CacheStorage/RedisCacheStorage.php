<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/24
 * Time: 9:44 PM
 */

namespace ESD\Plugins\WeChat\CacheStorage;

use ESD\Plugins\Redis\GetRedis;
use ESD\Plugins\WeChat\AbstractInterface\StorageInterface;

class RedisCacheStorage implements StorageInterface
{
    use GetRedis;
    private $key;

    public function __construct($appId)
    {
        $this->key = "wx:{$appId}:";
    }

    public function get($key)
    {
        $data = $this->redis()->get($this->key . $key);
        $json = json_decode($data, true);
        return $json;
    }
    /**
     * @param $key
     * @param $value
     * @param int|null $expire
     * @return bool
     * @throws \ESD\Plugins\Redis\RedisException
     */
    public function set($key, $value, int $expire = null)
    {
        // TODO: Implement set() method.
        return $this->redis()->set($this->key . $key, json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), $expire);
    }


}