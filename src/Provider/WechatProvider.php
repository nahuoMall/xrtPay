<?php

namespace Xmo\Api\Provider;


use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Wechat\Order\Detail;
use Xmo\Api\Functions\Wechat\Order\Order;
use Xmo\Api\Interfaces\Provider;

class WechatProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container): void
    {
        $container['micropay'] = function ($container) {
            return new Order($container, 'unified.trade.micropay');
        };
        $container['native'] = function ($container) {
            return new Order($container, 'pay.weixin.native');
        };
        $container['app'] = function ($container) {
            return new Order($container, 'unified.trade.pay');
        };
        $container['wap'] = function ($container) {
            return new Order($container, 'pay.weixin.wap');
        };
        $container['jspay'] = function ($container) {
            return new Order($container, 'pay.weixin.jspay');
        };
        $container['query'] = function ($container) {
            return new Detail($container, 'unified.trade.query');
        };
    }
}