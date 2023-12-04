<?php
/**
 * Created by PhpStorm.
 * User: stbz
 * Date: 2020/6/17
 * Time: 4:00 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Xmo\Api\Wechat;

$mchId = "001075552110006";
$appSecret = "e1cf0ddcf6b47b59c351565d8ad717af";
// 下单接口
$param = [
    'body' => '测试支付',
    'mch_create_ip' => '127.0.0.1',
    'out_trade_no' => '141903606228',
    'notify_url' => 'http://227.0.0.1:9001/javak/sds?123&23=3',
    'total_fee' => '1',
];

/** @var Wechat $xrtClient */
$xrtClient = \Hyperf\Support\make(Wechat::class);

## 初始化配置
$xrtClient->setMchId($mchId);
$xrtClient->setAppSecret($appSecret);

$response = $xrtClient->refund->refund($param);


var_dump($response);exit();
//订单详情
//$param = [];
$sn = "20191115204845294762_6_1_1";//三级订单号
$response = $xrtClient->app->createOrder($sn)->get();

//物流查询
//$param = [
//	'orderSn'=>'20200610111116', //商城订单号
//	'sku'=>4339236
//];
//
//$response = $supplyClient->order->setApi("/v2/logistic")->get();

//物流查询
//$param = [];
//$response = $supplyClient->order->setApi("/v2/logistic/firms")->get();

var_dump($response);