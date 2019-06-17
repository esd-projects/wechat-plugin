<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 21:11
 */

namespace ESD\Plugins\WeChat\OfficialAccount;

use ESD\Plugins\WeChat\Bean\OfficialAccount\RequestConst;
use Go\Core\Container;

class EventContainer extends Container
{
    function onSubscribe(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_SUBSCRIBE,$call);
        return $this;
    }

    function onUnSubscribe(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_UNSUBSCRIBE,$call);
        return $this;
    }

    function onScan(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_SCAN,$call);
        return $this;
    }

    function onLocation(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_LOCATION,$call);
        return $this;
    }

    function onClick(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_CLICK,$call);
        return $this;
    }

    function onView(callable $call):EventContainer
    {
        $this->set(RequestConst::EVENT_VIEW,$call);
        return $this;
    }
}