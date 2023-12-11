<?php

namespace Xmo\Api\Functions\Wechat;

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

}
