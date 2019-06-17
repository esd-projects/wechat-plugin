<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 22:32
 */

namespace ESD\Plugins\WeChat\Utility;

use ESD\Plugins\WeChat\Exception\RequestError;
use Swlib\Http\ContentType;
use Swlib\Http\SwUploadFile;
use Swlib\Saber;

/**
 * 协程客户端封装
 * Class HttpClient
 * @package
 * ESD\Plugins\WeChat\Utility
 */
class HttpClient
{
    /*
     * 一个应用内，基本没有必要实现不同的APP_ID 超时不同
     */
    static $CONNECT_TIMEOUT = 1;
    static $TIMEOUT = 1;
    const API_URL = "https://api.weixin.qq.com";
    /**
     * @var Saber
     */
    private static $http_client;


    /**
     * 发起一次Get请求并获得返回
     * @param string $url
     * @return Saber\Request|Saber\Response
     */
    static function get(string $url)
    {
        return self::client()->get($url);
    }

    /**
     * 返回内容进行Json解析
     * @param string $url
     * @return array
     * @throws InvalidUrl
     * @throws RequestError
     */
    static function getForJson(string $url): array
    {
        return self::parserJson(self::get($url));
    }

    /**
     * 发起一次POST请求
     * @param string $url 发起请求的链接
     * @param string|array $data 可以传入字符串和数组
     * @param int|null $timeout 如果传入则使用独立超时设置
     * @return Saber\Request|Saber\Response
     */
    static function post(string $url, $data = null, int $timeout = null)
    {
        $client = self::client();
        // 定义了独立的超时则使用独立设置
        if (!is_null($timeout) && $timeout > self::$TIMEOUT) {
            $client->setOptions(['timeout' => $timeout]);
        }
        return $client->post($url, $data);
    }

    /**
     * 返回内容进行Json解析
     * @param string $url 发起请求的链接
     * @param string|array $data 可以传入字符串和数组
     * @param int|null $timeout 如果传入则使用独立超时设置
     * @return array
     * @throws InvalidUrl
     * @throws RequestError
     */
    static function postForJson(string $url, $data, int $timeout = null)
    {
        return self::parserJson(self::post($url, $data, $timeout));
    }

    /**
     * 发送一次包体为JSON的POST
     * @param string $url 发起请求的链接
     * @param string|array $data 可以传入字符串和数组 数组会自动编码为JSON
     * @return Saber\Request|Saber\Response
     */
    static function postJson(string $url, $data)
    {
        $client = self::client();
        // 传入的数据需要提前编码为Json
        if (is_array($data)) {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
        $client->setOptions(['content_type' => ContentType::JSON]);
        return $client->post($url, $data);
    }

    /**
     * 发送一次包体为JSON的POST
     * 返回内容进行Json解析
     * @param string $url 发起请求的链接
     * @param string|array $data 可以传入字符串和数组 数组会自动编码为JSON
     * @return array
     * @throws InvalidUrl
     * @throws RequestError
     */
    static function postJsonForJson(string $url, array $data): array
    {
        return self::parserJson(self::postJson($url, $data));
    }

    /**
     * 上传一个本地文件
     * @param string $url 上传URL
     * @param string $uploadFile 本地文件的路径
     * @param string $uploadName 上传的表单名称
     * @param string|null $mimeType 文件的 MIME 不传则按照扩展名判断
     * @param string|null $filename 文件的名称
     * @param int $offset 上传的偏移量
     * @param int $length 需要发送的长度
     * @param int $timeout
     * @param null $extraPostData
     * @return Saber\Request|Saber\Response
     */
    static function uploadFileByPath($url, string $uploadFile, string $uploadName = 'upload', string $mimeType = null, string $filename = null, int $offset = 0, int $length = 0, $timeout = 30, $extraPostData = null)
    {
        $client = self::client($url);
        // 定义了独立的超时则使用独立设置
        if (!is_null($timeout) && $timeout > self::$TIMEOUT) {
            $client->setOptions(['timeout' => $timeout]);
        }
        $file = new SwUploadFile(
            $uploadFile,
            $filename,
            $mimeType
        );
        return $client->post($url, null, ['files' => [$file]]);
    }

    /**
     * 以字符串为内容上传
     * @param string $url 上传URL
     * @param string $uploadFile 本地文件的路径
     * @param string $uploadName 上传的表单名称
     * @param string|null $mimeType 文件的 MIME 不传则按照扩展名判断
     * @param string|null $filename 文件的名称
     * @param int $timeout
     * @param null $extraPostData
     * @return Saber\Request|Saber\Response
     * @throws InvalidUrl
     */
    static function uploadFileByContent($url, string $uploadFile, string $uploadName = 'upload', string $mimeType = null, string $filename = null, $timeout = 30, $extraPostData = null)
    {
        $client = self::client($url);
        // 定义了独立的超时则使用独立设置
        if (!is_null($timeout) && $timeout > self::$TIMEOUT) {
            $client->setOptions(['timeout' => $timeout]);
        }
        $file = new SwUploadFile(
            $uploadFile,
            $filename,
            $mimeType
        );
        return $client->post($url, null, ['files' => [$file]]);
    }

    /**
     * 返回Json进行解析
     * @param  $response
     * @return mixed
     * @throws RequestError
     */
    private static function parserJson($response)
    {
        $content = $response->getBody();
        $json = json_decode($content, true);
        // 解包失败认为请求出错
        if (!is_array($json)) {
            $ex = new RequestError();
            $ex->setResponse($response);
            throw $ex;
        }
        return $json;
    }


    /**
     * 获取一个协程客户端
     * @param string $url 需要请求的URL
     * @return Saber 返回客户端
     * @throws InvalidUrl 链接无效抛出异常
     */
    private static function client(): Saber
    {
        if (empty(self::$http_client)) {
            self::$http_client = Saber::create([
                'base_uri' => self::API_URL,
                'use_pool' => true,
                'timeout' => self::$TIMEOUT,

            ]);
        }
        return self::$http_client;
    }
}