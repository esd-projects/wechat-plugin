<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/24
 * Time: 9:32 PM
 */

namespace ESD\Plugins\WeChat\Config;

use ESD\Core\Plugins\Config\BaseConfig;
use ESD\Plugins\WeChat\AbstractInterface\StorageInterface;
use ESD\Plugins\WeChat\CacheStorage\RedisCacheStorage;

/**
 * 小程序配置文件
 * Class MiniProgramConfig
 * @package ESD\Plugins\WeChat\MiniProgram
 */
class MiniProgramConfig extends BaseConfig
{
    protected $appId;
    protected $appSecret;
    private $storage;

    const key = "wechat.mini_program_config";

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * 初始化小程序配置
     * @return void
     */
    protected function initialize(): void
    {
        // 如果没有设置临时目录则设置为系统临时目录
        if (empty($this->tempDir)) {
            $this->tempDir = sys_get_temp_dir();
        }
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
     * @return MiniProgramConfig
     */
    public function setAppId($appId): MiniProgramConfig
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
     * @return MiniProgramConfig
     */
    public function setAppSecret($appSecret): MiniProgramConfig
    {
        $this->appSecret = $appSecret;
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
     * @return MiniProgramConfig
     */
    public function setStorage(StorageInterface $storage): MiniProgramConfig
    {
        $this->storage = $storage;
        return $this;
    }

}