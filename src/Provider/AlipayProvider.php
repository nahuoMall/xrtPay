<?php

namespace Xmo\Api\Provider;

use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Wechat\Order\Order;
use Xmo\Api\Functions\Wechat\Order\Refund;
use Xmo\Api\Interfaces\Provider;

/**
 * Class StoreProvider
 * @package Xmo\Api\Provider
 */
class AlipayProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container)
    {
        $container['order']  = function ($container) {
            return new Order($container);
        };
        $container['refund'] = function ($container) {
            return new Refund($container);
        };
    }
}
