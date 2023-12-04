<?php

namespace Xmo\Api\Core;


/**
 * Class ContainerBase
 * @package Xmo\Api\Core
 */
class ContainerBase extends Container
{
    protected array $provider = [];
    public string $mchId = '';
    public string $appSecret = '';
    public string $service = '';
    public array $baseParams = [
        'version' => '2.0',
        'charset' => 'UTF-8',
        'sign_type' => 'MD5',
    ];

    /**
     * ContainerBase constructor.
     */
    public function __construct(array $params = [])
    {
        if (!empty($params)) {
            $this->baseParams = $params;
        }

        $providerCallback = function ($provider) {
            $obj = new $provider;
            $this->serviceRegister($obj);
        };
        array_walk($this->provider, $providerCallback);//注册
    }

    /**
     * @param $id
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * @param string $mchId
     * @return ContainerBase
     */
    public function setMchId(string $mchId): static
    {
        $this->mchId = $mchId;
        return $this;
    }

    /**
     * @param string $appSecret
     * @return ContainerBase
     */
    public function setAppSecret(string $appSecret): static
    {
        $this->appSecret = $appSecret;
        return $this;
    }


}
