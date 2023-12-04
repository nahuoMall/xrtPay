<?php
namespace Xmo\Api;

use Xmo\Api\Core\ContainerBase;
use Xmo\Api\Provider\AlipayProvider;

/**
 * Class Application
 */
class Alipay extends ContainerBase
{

    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        AlipayProvider::class,
        //...其他服务提供者
    ];
}
