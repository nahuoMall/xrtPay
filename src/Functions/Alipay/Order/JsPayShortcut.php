<?php

namespace Xmo\Api\Functions\Alipay\Order;

use Xmo\Api\Core\BaseClient;

/**
 * 订单模块
 */
class JsPayShortcut extends BaseClient
{

    /**
     * 创建订单
     * @param array $params
     * @return array
     */
    public function createOrder(array $params): array
    {
        return $this->curlRequest($params, 'post');
    }

    /**
     * 关闭订单
     * @param string $orderNo
     * @return array
     */
    public function closeOrder(string $orderNo): array
    {
        ## 设置接口名
        $this->service = 'unified.trade.close';
        ## 设置请求参数
        return $this->curlRequest(['out_trade_no' => $orderNo], 'post');
    }

}
