<?php
/**
 * File: GetWeChat.php
 * User: 4213509@qq.com
 * Date: 2019-06-15
 * Time: 19:07
 **/
namespace ESD\Plugins\WeChat;


use DI\Annotation\Inject;
use ESD\Plugins\WeChat\MiniProgram\MiniProgram;
use ESD\Plugins\WeChat\OfficialAccount\OfficialAccount;
use ESD\Plugins\WeChat\OpenPlatform\OpenPlatform;


trait GetWeChat
{
    /**
     * @Inject()
     * @var WeChat
     */
    protected $weChat;

    /**
     * @var miniProgram
     */
    protected $miniProgram;


    /**
     * 获取公众号实例
     * @return OfficialAccount
     */
    public function getOfficialAccount(): OfficialAccount
    {
        return $this->weChat->getOfficialAccount();
    }

    /**
     * 获取公众号实例
     * @return openPlatform
     */
    public function getOpenPlatform(): openPlatform
    {
        return $this->weChat->getOpenPlatform();
    }


    /**
     * 获取小程序实例
     * @return MiniProgram
     */
    public function getMiniProgram(): MiniProgram
    {
        return $this->weChat->getMiniProgram();
    }

}
