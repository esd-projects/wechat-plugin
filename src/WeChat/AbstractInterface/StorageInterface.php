<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018-12-29
 * Time: 22:04
 */

namespace ESD\Plugins\WeChat\AbstractInterface;


interface StorageInterface
{
    public function __construct(string $appId);
    public function get($key);
    public function set($key,$value,int $expire = null);
}