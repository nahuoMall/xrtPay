<?php

namespace Xmo\Api\Core;

use Xmo\Api\Tools\Guzzle;
use Xmo\Api\Tools\Sign;

/**
 * Class BaseClient
 * @package Xmo\Api\Core
 * @property BaseClient app
 */
class BaseClient
{
    use Sign;
    protected Container $app;
    public string $host = 'http://pay.xrtpay.com';
    public string $url = '/xrtpay/gateway';
    public string $service = '';

    /**
     * BaseClient constructor.
     * @param Container $app
     * @param string $service
     */
    public function __construct(Container $app, string $service)
    {
        $this->app = $app;
        $this->service = $service;
    }

    /**
     * curl 请求
     * @param array $data
     * @param string $method
     * @param int $timeout
     * @return array
     */
    public function curlRequest(array $data, string $method = 'get', int $timeout = 10): array
    {
        /** @var Guzzle $client */
        $client = \Hyperf\Support\make(Guzzle::class);

        unset($data['pay_client_type']);
        // 商户ID
        $data['mch_id'] = (string)$this->app->mchId;
        // 随机字符
        $data['nonce_str'] = (string)(int)microtime(true);
        ## 合并接口名
        $data['service'] = $this->service;
        ## 开始加密
        $data['sign'] = self::getSign($data);
        ## 设置请求参数
        $client->setHttpHandle(
            [
                'base_uri' => $this->host,
                'timeout' => $timeout,
                'verify' => false,
            ]
        );

        $method = 'send' . ucfirst($method);

        return $client->$method($this->url, $data);
    }

}
