<?php
/**
 * File: GetWeChat.php
 * User: 4213509@qq.com
 * Date: 2019-06-15
 * Time: 19:07
 **/
namespace ESD\Plugins\WeChat;

use ESD\Core\Plugins\Config\BaseConfig;
use ESD\Plugins\WeChat\Config\MiniProgramConfig;
use ESD\Plugins\WeChat\Config\OfficialAccountConfig;
use ESD\Plugins\WeChat\Config\OpenPlatformConfig;

/**
 * 全局配置定义
 * Class Config
 * @package
 * ESD\Plugins\WeChat
 */
class WeChatConfig extends BaseConfig
{

    /**
     * 小程序配置
     * @var MiniProgramConfig
     */
    protected $miniProgramConfig;

    /**
     * 开放平台配置
     * @var OpenPlatformConfig
     */
    protected $openPlatformConfig;

    /**
     * 公众号配置
     * @var OfficialAccountConfig
     */
    protected $officialAccountConfig;


    const key = "wechat";

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * @return OfficialAccountConfig
     */
    public function getOfficialAccountConfig()
    {
        return $this->officialAccountConfig;
    }

    /**
     * @param array $officialAccountConfig
     * @throws \ReflectionException
     */
    public function setOfficialAccountConfig(array $officialAccountConfig): void
    {
        if ($officialAccountConfig instanceof OfficialAccountConfig) {
            $this->officialAccountConfig = $officialAccountConfig;
        } else {
            $Officia = new OfficialAccountConfig();
            $Officia->buildFromConfig($officialAccountConfig);
            $this->officialAccountConfig = $Officia;
        }
    }

    /**
     * @return OpenPlatformConfig
     */
    public function getOpenPlatformConfig()
    {
        return $this->openPlatformConfig;
    }

    /**
     * @param array $openPlatformConfig
     * @throws \ReflectionException
     */
    public function setOpenPlatformConfig(array $openPlatformConfig): void
    {
        if ($openPlatformConfig instanceof OpenPlatformConfig) {
            $this->officialAccountConfig = $openPlatformConfig;
        } else {
            $openConfig = new OpenPlatformConfig();
            $openConfig->buildFromConfig($openPlatformConfig);
            $this->openPlatformConfig = $openConfig;
        }
    }

    /**
     * @return MiniProgramConfig
     */
    public function getMiniProgramConfig()
    {
        return $this->miniProgramConfig;
    }

    /**
     * @param MiniProgramConfig $miniProgramConfig
     * @throws \ReflectionException
     */
    public function setMiniProgramConfig(array $miniProgramConfig): void
    {
        if ($miniProgramConfig instanceof MiniProgramConfig) {
            $this->miniProgramConfig = $miniProgramConfig;
        } else {
            $miniConfig = new MiniProgramConfig();
            $miniConfig->buildFromConfig($miniProgramConfig);
            $this->miniProgramConfig = $miniConfig;
        }
    }

}