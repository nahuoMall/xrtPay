# 适配hyperf的聚合美的支付平台SDK
## Installing

```shell
$ composer require nahuomall/xrtpay -vvv
```

## Usage

```php
        // $obj = new \Xmo\Api\Wechat(); 
        // or 
        $obj = \Hyperf\Support\make(\Xmo\Api\Wechat::class)
        
        $obj->setMchId('你的商户ID');
        $obj->setAppsecret('你的秘钥');
        // 小程序
        $res =$obj->mini->createOrder([]);
        // app
        $res =$obj->app->createOrder([]);
        // 扫码
        $res =$obj->micropay->createOrder([]);
        // 网页
        $res =$obj->wap->createOrder([]);
        
        var_dump($res);
```

更新日志：

1.修复php8下，因为强类型返回参数报错问题
2.增加hyperf 协程 Guzzle client 客户端
3.修复部分bug
4.重新设计sdk架构
5.处理替换curl

## License

MIT
