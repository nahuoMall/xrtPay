<?php

namespace Xmo\Api\Provider;

use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Alipay\AppPayShortcut;
use Xmo\Api\Functions\Alipay\JsPayShortcut;
use Xmo\Api\Functions\Alipay\NativePayShortcut;
use Xmo\Api\Functions\Alipay\WapPayShortcut;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderDetail;
use Xmo\Api\Functions\Public\OrderRefund;
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
        $container['close'] = function ($container) {
            return new OrderClose($container, 'unified.trade.close');
        };
        $container['refund'] = function ($container) {
            return new OrderRefund($container, 'unified.trade.refund');
        };
    }
}
