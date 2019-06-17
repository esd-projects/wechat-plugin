<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 22:50
 */

namespace ESD\Plugins\WeChat\Exception;


use ESD\Core\Server\Beans\Response;

class RequestError extends Exception
{
    private $response;

    /**
     * @return mixed
     */
    public function getResponse():Response
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }
}