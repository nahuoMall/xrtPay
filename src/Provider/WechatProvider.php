<?php

namespace Xmo\Api\Provider;


use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderDetail;
use Xmo\Api\Functions\Public\OrderRefund;
use Xmo\Api\Functions\Wechat\AppPayShortcut;
use Xmo\Api\Functions\Wechat\JsPayShortcut;
use Xmo\Api\Functions\Wechat\MicroPayShortcut;
use Xmo\Api\Functions\Wechat\NativePayShortcut;
use Xmo\Api\Functions\Wechat\WapPayShortcut;
use Xmo\Api\Interfaces\Provider;

class WechatProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container): void
    {
        $container['native'] = function ($container) {
            return new NativePayShortcut($container, 'pay.weixin.native');
        };
        $container['app'] = function ($container) {
            return new AppPayShortcut($container, 'unified.trade.pay');
        };
        $container['wap'] = function ($container) {
            return new WapPayShortcut($container, 'pay.weixin.wap');
        };
        $container['jspay'] = function ($container) {
            return new JsPayShortcut($container, 'pay.weixin.jspay');
        };
        $container['query'] = function ($container) {
            return new OrderDetail($container, 'unified.trade.query');
        };
        $container['refund'] = function ($container) {
            return new OrderRefund($container, 'unified.trade.refund');
        };
        $container['close'] = function ($container) {
            return new OrderClose($container, 'unified.trade.close');
        };
    }
}