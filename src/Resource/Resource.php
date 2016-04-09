<?php

namespace Woolf\Shophpify\Resource;

use Woolf\Shophpify\Client;
use Woolf\Shophpify\Endpoint;

abstract class Resource
{
    protected $endpoint;

    protected $client;

    public static function make($domain, $accessToken = null)
    {
        return new static(new Endpoint($domain), new Client($accessToken));
    }

    public function __construct(Endpoint $endpoint, Client $client)
    {
        $this->endpoint = $endpoint;

        $this->client = $client;
    }
}