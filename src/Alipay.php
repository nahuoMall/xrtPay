<?php
namespace Xmo\Api;

use Xmo\Api\Core\ContainerBase;
use Xmo\Api\Functions\Alipay\Order\AppPayShortcut;
use Xmo\Api\Functions\Alipay\Order\JsPayShortcut;
use Xmo\Api\Functions\Alipay\Order\NativePayShortcut;
use Xmo\Api\Functions\Alipay\Order\OrderDetail;
use Xmo\Api\Functions\Alipay\Order\WapPayShortcut;
use Xmo\Api\Functions\Public\OrderClose;
use Xmo\Api\Functions\Public\OrderRefund;
use Xmo\Api\Provider\AlipayProvider;

/**
 * Class Application
 */
class Alipay extends ContainerBase
{
    protected JsPayShortcut $jspay;
    protected AppPayShortcut $app;
    protected NativePayShortcut $native;
    protected WapPayShortcut $wap;
    protected OrderDetail $detail;
    protected OrderRefund $refund;

    protected OrderClose $close;

    /**
     * 服务提供者
     * @var array
     */
    protected array $provider = [
        AlipayProvider::class,
        //...其他服务提供者
    ];
}
