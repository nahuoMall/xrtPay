<?php

namespace Xmo\Api\Provider;


use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Wechat\Order\AppPayShortcut;
use Xmo\Api\Functions\Wechat\Order\JsPayShortcut;
use Xmo\Api\Functions\Wechat\Order\MicroPayShortcut;
use Xmo\Api\Functions\Wechat\Order\NativePayShortcut;
use Xmo\Api\Functions\Wechat\Order\OrderDetail;
use Xmo\Api\Functions\Wechat\Order\WapPayShortcut;
use Xmo\Api\Interfaces\Provider;

/**
 * @method MicroPayShortcut micropay
 * @method NativePayShortcut native
 * @method AppPayShortcut app
 * @method WapPayShortcut wap
 * @method JsPayShortcut jspay
 */
class WechatProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container): mixed
    {
        $container['micropay'] = function ($container) {
            return new MicroPayShortcut($container, 'unified.trade.micropay');
        };
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
    }
}