<?php
/**
 * File: WeChatPlugin.php
 * User: 4213509@qq.com
 * Date: 2019-06-15
 * Time: ${Time}
 **/

namespace ESD\Plugins\WeChat;

use ESD\Core\Context\Context;
use ESD\Core\PlugIn\AbstractPlugin;
use ESD\Core\PlugIn\PluginInterfaceManager;
use ESD\Core\Plugins\Config\ConfigException;

class WeChatPlugin extends AbstractPlugin
{
    /**
     * @var WeChatConfig
     */
    private $weChatConfig;

    /**
     * 获取插件名字
     * @return string
     */
    public function getName(): string
    {
        return "WeChat";
    }

    /**
     * CachePlugin constructor.
     */
    public function __construct(?WeChatConfig $weChatConfig = null)
    {
        parent::__construct();
        if ($weChatConfig == null) {
            $weChatConfig = new WeChatConfig();
        }
        $this->weChatConfig = $weChatConfig;
    }

    /**
     * @param PluginInterfaceManager $pluginInterfaceManager
     * @return mixed|void
     */
    public function onAdded(PluginInterfaceManager $pluginInterfaceManager)
    {
        parent::onAdded($pluginInterfaceManager);
    }

    /**
     * @param Context $context
     * @return mixed|void
     * @throws ConfigException
     */
    public function init(Context $context)
    {
        parent::init($context);
        $this->weChatConfig->merge();
    }

    /**
     * 在服务启动前
     * @param Context $context
     * @return mixed
     * @throws ConfigException
     */
    public function beforeServerStart(Context $context)
    {
    }

    /**
     * 在进程启动前
     * @param Context $context
     * @return mixed
     */
    public function beforeProcessStart(Context $context)
    {
        $this->ready();
    }
}