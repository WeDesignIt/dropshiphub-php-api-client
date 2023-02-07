<?php

namespace WeDesignIt\Dropshiphub;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Client
{
    /**
     * @var string
     */
    protected string $baseUrl = 'https://dropshiphub.nl/api/v1/';

    /**
     * @var GuzzleClient
     */
    protected GuzzleClient $client;

    /**
     * Access tokens may be requested from Dropshiphub.
     *
     * @var string
     */
    private string $token;

    private string $companyId;

    /**
     * Client constructor.
     *
     * @param string $token
     */
    public function __construct(string $token, string $companyId, ?LoggerInterface $logger = null)
    {
        $this->token = $token;
        $this->companyId = $companyId;

        $parameters = [
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
                'X-Company-Id' => $this->companyId,
                'User-Agent' => 'dropshiphub-php-api-client/1.0 (github.com/wedesignit/dropshiphub-php-api-client)',
            ],
        ];
        if (!empty($logger)){
            $stack = HandlerStack::create();

            $stack->push(Middleware::log(
                $logger,
                new MessageFormatter(MessageFormatter::DEBUG)),
                LogLevel::DEBUG
            );

            $parameters['handler'] = $stack;
        }

        $this->client = new GuzzleClient($parameters);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return array|string Array if the response was JSON, raw response body otherwise.
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $uri,
        array $options = []
    ): array|string
    {
        $response = $this->rawRequest($method, $uri, $options);

        $response->getBody()->seek(0);
        $contents = $response->getBody()->getContents();

        // fallback to application/json as this is, the default return type
        $default = 'application/json';
        if (stristr(($response->getHeader('Content-Type')[0] ?? $default), 'application/json') !== false) {
            $array = json_decode($contents, true);

            return (array) $array;
        } else {
            return $contents;
        }
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function rawRequest(
        string $method,
        string $uri,
        array $options = []
    ): ResponseInterface
    {
        return $this->client->request($method, $uri, $options);
    }
}