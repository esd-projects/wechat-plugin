<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/25
 * Time: 12:09 AM
 */

namespace ESD\Plugins\WeChat\MiniProgram;

use ESD\Plugins\WeChat\Exception\InvalidUrl;
use ESD\Plugins\WeChat\Exception\RequestError;
use ESD\Plugins\WeChat\Utility\HttpClient;
use ESD\Plugins\WeChat\Exception\MiniProgramError;

/**
 * 访问令牌管理
 * Class AccessToken
 * @package ESD\Plugins\WeChat\MiniProgram
 */
class AccessToken extends MinProgramBase
{

    /**
     * 获取访问令牌 默认刷新一次
     * @param int $refreshTimes 获取失败的重试次数
     * @return string|null
     * @throws MiniProgramError
     * @throws RequestError
     * @throws InvalidUrl
     */
    public function getToken($refreshTimes = 1): ?string
    {
        if ($refreshTimes < 0) {
            return null;
        }
        $data = $this->getMiniProgram()->getConfig()->getStorage()->get('access_token');
        if (!empty($data)) {
            return $data;
        } else {
            $this->refresh();
            return $this->getToken($refreshTimes - 1);
        }
    }

    /**
     * 刷新访问令牌
     * @return string
     * @throws MiniProgramError
     * @throws RequestError
     * @throws InvalidUrl
     */
    public function refresh(): string
    {
        $config = $this->getMiniProgram()->getConfig();
        $url = ApiUrl::generateURL(ApiUrl::AUTH_GET_ACCESS_TOKEN, [
            'APPID'     => $config->getAppId(),
            'APPSECRET' => $config->getAppSecret()
        ]);
        $responseArray = HttpClient::getForJson($url);
        $ex = MiniProgramError::hasException($responseArray);
        if ($ex) {
            throw $ex;
        }
        $token = $responseArray['access_token'];
        $config->getStorage()->set('access_token', $token, time() + 7180); // 这里故意设置为7180 提前刷新
        return $token;
    }
}