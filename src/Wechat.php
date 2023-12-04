<?php

namespace Xmo\Api;

use Xmo\Api\Core\ContainerBase;
use Xmo\Api\Functions\Wechat\Order\Detail;
use Xmo\Api\Functions\Wechat\Order\MicroPayShortcut;
use Xmo\Api\Functions\Wechat\Order\JsPayShortcut;
use Xmo\Api\Functions\Wechat\Order\Refund;
use Xmo\Api\Functions\Wechat\Order\WapPayShortcut;
use Xmo\Api\Functions\Wechat\Order\AppPayShortcut;
use Xmo\Api\Functions\Wechat\Order\NativePayShortcut;
use Xmo\Api\Provider\WechatProvider;

class Wechat extends ContainerBase
{
    protected MicroPayShortcut $micropay;
    protected JsPayShortcut $jspay;
    protected AppPayShortcut $app;
    protected NativePayShortcut $native;
    protected WapPayShortcut $wap;
    protected Detail $detail;
    protected Refund $refund;

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
