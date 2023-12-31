<?php

namespace Xmo\Api;

use Xmo\Api\Core\ContainerBase;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderDetail;
use Xmo\Api\Functions\Public\OrderRefund;
use Xmo\Api\Functions\Wechat\AppPayShortcut;
use Xmo\Api\Functions\Wechat\JsPayShortcut;
use Xmo\Api\Functions\Wechat\NativePayShortcut;
use Xmo\Api\Functions\Wechat\WapPayShortcut;
use Xmo\Api\Provider\WechatProvider;

class Wechat extends ContainerBase
{
    protected JsPayShortcut $jspay;
    protected AppPayShortcut $app;
    protected NativePayShortcut $native;
    protected WapPayShortcut $wap;
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
        WechatProvider::class,
        //...其他服务提供者
    ];
}
