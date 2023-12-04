<?php

namespace Xmo\Api\Tools;

trait Sign
{

    /**
     * 签名
     * @param array $data
     * @return string
     */
    public function getSign(array $data): string
    {
        // 去除空数据
        $data = array_filter($data);
        // 排序字段
        ksort($data);
        // 加密
        return strtoupper(md5(urldecode(http_build_query($data)) . "&key=" . $this->app->appSecret));
    }

}