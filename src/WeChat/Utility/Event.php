<?php
namespace ESD\Plugins\WeChat\Utility;

use Go\Core\Container;

/**
 * File: Event.php
 * User: 4213509@qq.com
 * Date: 2019-06-17
 * Time: ${Time}
 **/
class Event extends Container
{
    /**
     * @param string $key
     * @param mixed $item
     * @param array $tags
     * @return bool|void
     */
    function set($key, $item, array $tags = [])
    {
        if (is_callable($item)) {
            return parent::set($key, $item, $tags);
        } else {
            return false;
        }
    }

    /**
     * @param $event
     * @param mixed ...$args
     * @return mixed|null
     * @throws \Throwable
     */
    public function hook($event, ...$args)
    {
        $call = $this->get($event);
        if (is_callable($call)) {
            return call_user_func($call, ...$args);
        } else {
            return null;
        }
    }
}