<?php
/**
 * File: GetWeChat.php
 * User: 4213509@qq.com
 * Date: 2019-06-15
 * Time: 19:07
 **/
namespace ESD\Plugins\WeChat;

use DI\Annotation\Inject;
use ESD\Plugins\WeChat\Config\MiniProgramConfig;
use ESD\Plugins\WeChat\Config\OfficialAccountConfig;
use ESD\Plugins\WeChat\Config\OpenPlatformConfig;
use ESD\Plugins\WeChat\MiniProgram\MiniProgram;
use ESD\Plugins\WeChat\OfficialAccount\OfficialAccount;
use ESD\Plugins\WeChat\OpenPlatform\OpenPlatform;

/**
 * 微信SDK入口类
 * Class WeChat
 * @package ESD\Plugins\WeChat
 */
class WeChat
{

    /**
     * 微信小程序实例
     * @var MiniProgram
     */
    private $miniProgram;

    /**
     * 微信开放平台实例
     * @var OpenPlatform
     */
    private $openPlatform;

    /**
     * 微信公众号实例
     * @var OfficialAccount
     */
    private $officialAccount;

    /**
     * @var WeChatConfig
     */
    private $weChatConfig;

    public function __construct(WeChatConfig $weChatConfig)
    {
        $this->weChatConfig = $weChatConfig;
    }

    /**
     * 获取小程序实例
     * @return MiniProgram
     */
    public function getMiniProgram(): MiniProgram
    {
        if (!isset($this->miniProgram)) {
            $this->miniProgram = new MiniProgram($this->weChatConfig->getMiniProgramConfig());
        }
        return $this->miniProgram;
    }

    /**
     * 获取公众号实例
     * @return OfficialAccount
     */
    public function getOfficialAccount(): OfficialAccount
    {
        if (!isset($this->officialAccount)) {
            $this->officialAccount = new OfficialAccount($this->weChatConfig->getOfficialAccountConfig());
        }
        return $this->officialAccount;
    }

    /**
     * 获取开放平台实例
     * @return OpenPlatform
     */
    public function getOpenPlatform(): OpenPlatform
    {
        if (!isset($this->openPlatform)) {
            $this->openPlatform = new OpenPlatform($this->weChatConfig->getOpenPlatformConfig());
        }
        return $this->openPlatform;
    }
}