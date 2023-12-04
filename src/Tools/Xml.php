<?php

namespace Xmo\Api\Tools;

class Xml
{
    /**
     * @param $arr
     * @return string
     */
    public static function arrayToXml($arr): string
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_array($val)) {
                $xml .= "<" . $key . ">" . self::arrayToXml($val) . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * @param $xml
     * @return array
     */
    public static function xmlToArray($xml): array
    {
        $xmlArray = simplexml_load_string($xml);

        return json_decode(json_encode($xmlArray), true);
    }
}