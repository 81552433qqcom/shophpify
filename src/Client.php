<?php

namespace Woolf\Shophpify;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class Client
{
    protected $clientId;

    protected $clientSecret;

    protected $accessToken;

    public function __construct($clientId, $clientSecret, $accessToken = null)
    {
        $this->clientId = $clientId;

        $this->clientSecret = $clientSecret;

        $this->accessToken = $accessToken;
    }

    public function get($url, array $options = [])
    {
        return $this->http()->get($url, $options);
    }

    public function post($url, array $options = [])
    {
        return $this->http()->post($url, $this->prepare($options));
    }

    public function put($url, array $options = [])
    {
        return $this->http()->put($url, $this->prepare($options));
    }

    public function delete($url, array $options = [])
    {
        return $this->http()->delete($url, $this->prepare($options));
    }

    protected function http()
    {
        return new GuzzleClient($this->config());
    }

    public function config()
    {
        return (! is_null($this->accessToken)) ? $this->tokenHeader() : [];
    }

    public function tokenHeader()
    {
        return ['headers' => ['X-Shopify-Access-Token' => $this->accessToken]];
    }

    protected function prepare(array $options = [])
    {
        return (empty($options)) ? $options : ['form_params' => $options];
    }

    public function parse(ResponseInterface $response, $extract = false)
    {
        $response = json_decode($response->getBody(), true);

        if ($extract) {
            return isset($response[$extract]) ? $response[$extract] : false;
        }

        return $response;
    }
}