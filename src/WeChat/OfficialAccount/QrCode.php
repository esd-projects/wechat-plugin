<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/25
 * Time: 12:25 AM
 */

namespace ESD\Plugins\WeChat\OfficialAccount;

use ESD\Plugins\WeChat\Bean\OfficialAccount\QrCodeRequest;
use ESD\Plugins\WeChat\Bean\OfficialAccount\QrCode as QrCodeBean;
use ESD\Plugins\WeChat\Exception\OfficialAccountError;
use ESD\Plugins\WeChat\Utility\HttpClient;

class QrCode extends OfficialAccountBase
{
    /**
     * 获取二维码TICKET
     * @param QrCodeRequest $codeRequest
     * @return QrCodeBean|null
     * @throws OfficialAccountError
     * @throws \ ESD\Plugins\WeChat\Exception\RequestError
     */
    function getTick(QrCodeRequest $codeRequest): ?QrCodeBean
    {
        $token = $this->getOfficialAccount()->accessToken()->getToken();
        $response = HttpClient::postJsonForJson(ApiUrl::generateURL(ApiUrl::QRCODE_CREATE, [
            'ACCESS_TOKEN' => $token
        ]), $codeRequest->toArray());

        $ex = OfficialAccountError::hasException($response);
        if ($ex) {
            throw $ex;
        } else {
            return new QrCodeBean($response);
        }
    }

    /**
     * 二维码TICKET换取图片URL
     * @param QrCodeBean $code
     * @return string|null
     */
    public static function tickToImageUrl(QrCodeBean $code): ?string
    {
        return ApiUrl::generateURL(ApiUrl::SHOW_QRCODE, [
            'TICKET' => $code->getTicket()
        ]);
    }
}