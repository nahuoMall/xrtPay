<?php

namespace Xmo\Api\Provider;

use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Alipay\Order\AppPayShortcut;
use Xmo\Api\Functions\Alipay\Order\JsPayShortcut;
use Xmo\Api\Functions\Alipay\Order\NativePayShortcut;
use Xmo\Api\Functions\Alipay\Order\OrderDetail;
use Xmo\Api\Functions\Alipay\Order\WapPayShortcut;
use Xmo\Api\Interfaces\Provider;

/**
 * Class AlipayProvider
 * @package Xmo\Api\Provider
 */
class AlipayProvider implements Provider
{

    /**
     * 服务提供者
     * @param Container $container
     */
    public function serviceProvider(Container $container): void
    {
        $container['native'] = function ($container) {
            return new NativePayShortcut($container, 'pay.alipay.native');
        };
        $container['app'] = function ($container) {
            return new AppPayShortcut($container, 'alipay.trade.app.pay');
        };
        $container['wap'] = function ($container) {
            return new WapPayShortcut($container, 'pay.alipay.wap');
        };
        $container['jspay'] = function ($container) {
            return new JsPayShortcut($container, 'pay.alipay.jspay');
        };
        $container['query'] = function ($container) {
            return new OrderDetail($container, 'unified.trade.query');
        };
    }
}
