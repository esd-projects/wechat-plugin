<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/5/15
 * Time: 13:48
 */

namespace ESD\Plugins\WeChat\exampleClass;

use ESD\Core\Server\Beans\Request;
use ESD\Core\Server\Beans\Response;
use ESD\Core\Server\Beans\WebSocketFrame;
use ESD\Core\Server\Port\ServerPort;
use ESD\Plugins\WeChat\Exception\OfficialAccountError;
use ESD\Plugins\WeChat\Exception\RequestError;
use ESD\Plugins\WeChat\GetWeChat;

class TestPort extends ServerPort
{


    use GetWeChat;


    public function onTcpConnect(int $fd, int $reactorId)
    {
        // TODO: Implement onTcpConnect() method.
    }

    public function onTcpClose(int $fd, int $reactorId)
    {
        // TODO: Implement onTcpClose() method.
    }

    public function onWsClose(int $fd, int $reactorId)
    {
        // TODO: Implement onWsClose() method.
    }

    public function onTcpReceive(int $fd, int $reactorId, string $data)
    {
        // TODO: Implement onTcpReceive() method.
    }

    public function onUdpPacket(string $data, array $clientInfo)
    {
        // TODO: Implement onUdpPacket() method.
    }

    public function onHttpRequest(Request $request, Response $response)
    {

        $wechat = $this->getOfficialAccount();

        try {
        $user_list = $wechat->user()->list();
        print_r($user_list);
    } catch (RequestError $requestError) {
        print_r($requestError->getMessage());
    } catch (OfficialAccountError $error) {
        print_r($error->getMessage());
    }


    }

    public function onWsMessage(WebSocketFrame $frame)
    {
        // TODO: Implement onWsMessage() method.
    }

    public function onWsPassCustomHandshake(Request $request): bool
    {
        // TODO: Implement onWsPassCustomHandshake() method.
    }

    public function onWsOpen(Request $request)
    {
        // TODO: Implement onWsOpen() method.
    }
}