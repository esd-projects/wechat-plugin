<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2019-03-18
 * Time: 09:35
 */

namespace ESD\Plugins\WeChat\Config;

use ESD\Core\Plugins\Config\BaseConfig;
use ESD\Plugins\WeChat\AbstractInterface\StorageInterface;
use ESD\Plugins\WeChat\CacheStorage\RedisCacheStorage;

/**
 * TODO:未完善
 * 开放平台配置
 * Class OpenPlatformConfig
 * @package ESD\Plugins\WeChat\OpenPlatform
 */
class OpenPlatformConfig extends BaseConfig
{
    protected $appId;
    protected $appSecret;
    private $storage;

    const key = "wechat.open_platform_config";

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * 获取AppId
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * 设置AppId
     * @param mixed $appId
     * @return OpenPlatformConfig
     */
    public function setAppId($appId): OpenPlatformConfig
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * 获取AppSecret
     * @return mixed
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * 设置AppSecret
     * @param mixed $appSecret
     * @return OpenPlatformConfig
     */
    public function setAppSecret($appSecret): OpenPlatformConfig
    {
        $this->appSecret = $appSecret;
        return $this;
    }

    /**
     * 获取储存器
     * @return mixed
     */
    public function getStorage(): StorageInterface
    {
        if (!isset($this->storage)) {
            $this->storage = new RedisCacheStorage($this->getAppId());
        }
        return $this->storage;
    }
    /**
     * 设置储存器
     * @param mixed $storage
     * @return OpenPlatformConfig
     */
    public function setStorage($storage)
    {
        // TODO:
//        if (class_exists($storage)) {
//            $this->storage == new $storage($this->getAppId());
//        } else {
//            $this->storage = new RedisCacheStorage($this->getAppId());
//        }
    }

}