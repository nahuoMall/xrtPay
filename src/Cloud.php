<?php

namespace Xmo\Api;

use Xmo\Api\Core\ContainerBase;
use Xmo\Api\Functions\Cloud\CloudPayShortcut;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderDetail;
use Xmo\Api\Functions\Public\OrderRefund;
use Xmo\Api\Provider\CloudProvider;

class Cloud extends ContainerBase
{
    protected CloudPayShortcut $cloud;
    protected OrderDetail $query;
    protected OrderRefund $refund;

    protected OrderClose $close;

    /**
     * XrtClient constructor.
     * @param array $params 应用级参数
     */
    public function __construct(array $params = array())
    {
        parent::__construct($params);
    }

    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        CloudProvider::class,
        //...其他服务提供者
    ];
}
