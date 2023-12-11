<?php

namespace Xmo\Api\Functions\Cloud;

use Xmo\Api\Core\BaseClient;

/**
 * 订单模块
 */
class CloudPayShortcut extends BaseClient
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
     * 获取用户信息
     * @param array $params
     * @return ?string
     */
    public function getUser(array $params): ?string
    {
        $params['service'] = 'unpay.trade.userid';
        $info = $this->curlRequest($params, 'post');

        if (!empty($info) && $info['status'] == 0) {
            return $info['user_id'];
        }

        return null;
    }

}
