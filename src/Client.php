<?php

namespace Woolf\Shophpify;

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

    public function config()
    {
        return (! is_null($this->accessToken)) ? $this->tokenHeader() : [];
    }

    public function tokenHeader()
    {
        return ['headers' => ['X-Shopify-Access-Token' => $this->accessToken]];
    }
}