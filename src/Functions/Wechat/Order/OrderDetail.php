<?php

namespace Xmo\Api\Functions\Wechat\Order;

use Xmo\Api\Core\BaseClient;

/**
 * 订单模块
 */
class OrderDetail extends BaseClient
{

    /**
     * 统一查询订单
     * @param string $orderNo
     * @param string $transactionId
     * @return array
     */
    public function getInfo(string $orderNo = '', string $transactionId = ''): array
    {
        return $this->curlRequest(['order_no' => $orderNo, 'transaction_id' => $transactionId], 'post');
    }

}
