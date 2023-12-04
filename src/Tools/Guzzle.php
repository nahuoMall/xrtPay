<?php

namespace Xmo\Api\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use App\Exception\ServiceException;
use Hyperf\Guzzle\CoroutineHandler;
use Psr\Http\Message\ResponseInterface;
use Xmo\Api\Constants\XrtErrorCode;

class Guzzle
{
    private Client $client;

    protected array $headers = [];

    /**
     * @param array $options
     * @return $this
     */
    public function setHttpHandle(array $options = []): static
    {
        !empty($options['headers']) && $options['headers'] = array_merge($options['headers'], $this->headers);

        $options['handler'] = HandlerStack::create(new CoroutineHandler());

        $this->client = \Hyperf\Support\make(Client::class, [$options]);

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
     * @throws GuzzleException
     */
    public function sendPost(string $url, array $params): array
    {

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

        if (empty($result) || $statusCode != 200) {
            throw new ServiceException(XrtErrorCode::ORDER_SERVICE_ERROR, '请求支付服务错误');
        }


        if ($result['status'] != 0) {
            throw new ServiceException(XrtErrorCode::PAY_POST_ERROR, !empty($result['message']) && is_string($result['message']) ? $result['message'] : null);
        }

        return $result;
    }

}