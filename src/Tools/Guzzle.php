<?php

namespace Xmo\Api\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Xmo\Api\Constants\XrtErrorCode;
use Hyperf\Guzzle\CoroutineHandler;
use Psr\Http\Message\ResponseInterface;
use Xmo\Api\Exception\PayException;

class Guzzle
{
    private Client $client;

    protected static string $url = 'https://pay.xrtpay.com/xrtpay/gateway';

    protected array $headers = [
        'Content-Type' => 'text/xml; charset=UTF8',
    ];

    /**
     * @param array $options
     * @return $this
     */
    public function setHttpHandle(array $options = []): static
    {
         $options['handler'] = HandlerStack::create(new CoroutineHandler());

        $options['headers'] = $this->headers;

        $this->client = new Client($options);

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function sendGet(string $url, array $params): array
    {
        $result = $this->client->get($url, ['query' => $params]);

        return $this->getResult($result);
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function sendPost(string $url, array $params): array
    {
        logger('xrtpay')->info('XRTPAY POST', ['url' => $url, 'params' => $params]);

        $result = $this->client->post($url, ['body' => Xml::arrayToXml($params)]);

        return $this->getResult($result);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    private function getResult(ResponseInterface $response): array
    {
        $result = $response->getBody()->getContents();

        $statusCode = $response->getStatusCode();

        $result = Xml::xmlToArray($result);

        logger('xrtpay')->info('XRTPAY POST RESULT', $result);

        if (empty($result) || $statusCode != 200) {
            throw new PayException(XrtErrorCode::ORDER_SERVICE_ERROR, '请求支付服务错误');
        }

        if ($result['status'] != 0) {
            throw new PayException(XrtErrorCode::PAY_POST_ERROR, !empty($result['message']) && is_string($result['message']) ? $result['message'] : null);
        }

        return $result;
    }

}