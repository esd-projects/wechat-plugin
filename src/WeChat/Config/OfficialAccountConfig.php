<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/24
 * Time: 5:00 PM
 */

namespace ESD\Plugins\WeChat\Config;

use ESD\Core\Plugins\Config\BaseConfig;
use ESD\Plugins\WeChat\AbstractInterface\StorageInterface;
use ESD\Plugins\WeChat\CacheStorage\RedisCacheStorage;

/**
 * 公众号配置文件
 * Class OfficialAccountConfig
 * @package ESD\Plugins\WeChat\OfficialAccount
 */
class OfficialAccountConfig extends BaseConfig
{
    protected $token;
    protected $aesKey;
    protected $appId;
    protected $appSecret;
    protected $encrypt = false;
    private $storage;


    const key = "wechat.official_account_config";

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * 获取Token
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * 设置Token
     * @param $token
     * @return OfficialAccountConfig
     */
    public function setToken($token): OfficialAccountConfig
    {
        $this->token = $token;
        return $this;
    }

    /**
     * 获取AesKey
     * @return mixed
     */
    public function getAesKey()
    {
        return $this->aesKey;
    }

    /**
     * 设置AesKey
     * @param $aesKey
     * @return OfficialAccountConfig
     */
    public function setAesKey($aesKey): OfficialAccountConfig
    {
        $this->aesKey = $aesKey;
        return $this;
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
     * @param $appId
     * @return OfficialAccountConfig
     */
    public function setAppId($appId): OfficialAccountConfig
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
     * @param $appSecret
     * @return OfficialAccountConfig
     */
    public function setAppSecret($appSecret): OfficialAccountConfig
    {
        $this->appSecret = $appSecret;
        return $this;
    }

    /**
     * 加密模式
     * @return bool
     */
    public function isEncrypt(): bool
    {
        return $this->encrypt;
    }

    /**
     * 设置加密模式
     * @param bool $encrypt
     * @return OfficialAccountConfig
     */
    public function setEncrypt(bool $encrypt): OfficialAccountConfig
    {
        $this->encrypt = $encrypt;
        return $this;
    }

    /**
     * 获取储存器
     * @return StorageInterface
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
     * @param StorageInterface $storage
     * @return OfficialAccountConfig
     */
    public function setStorage(StorageInterface $storage): OfficialAccountConfig
    {
        $this->storage = $storage;
        return $this;
    }

}