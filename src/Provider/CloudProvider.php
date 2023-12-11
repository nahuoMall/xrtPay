<?php

namespace Xmo\Api\Provider;


use Xmo\Api\Core\Container;
use Xmo\Api\Functions\Cloud\CloudPayShortcut;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderDetail;
use Xmo\Api\Functions\Public\OrderRefund;
use Xmo\Api\Interfaces\Provider;

class CloudProvider implements Provider
{
    /**
     * @inheritDoc
     */
    public function serviceProvider(Container $container): void
    {
        $container['cloud'] = function ($container) {
            return new CloudPayShortcut($container, 'unpay.trade.jspay');
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