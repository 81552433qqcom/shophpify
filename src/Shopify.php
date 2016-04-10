<?php

namespace Woolf\Shophpify;

use Exception;

class Shopify
{
    protected $domain;

    protected $accessToken;

    protected $resources = [];

    public function __construct($domain, $accessToken = null)
    {
        $this->domain = $domain;

        $this->accessToken = $accessToken;
    }

    public function setDomain($domain)
    {
        return new static($domain, $this->accessToken);
    }

    public function setAccessToken($accessToken)
    {
        return new static($this->domain, $accessToken);
    }

    public function __get($name)
    {
        $class = implode('', array_map('ucfirst', explode('_', $name)));

        return $this->resource($class);
    }

    public function resource($class)
    {
        $resource = $this->fullyQualified($class);

        if (isset($this->resources[$resource])) {
            return $this->resources[$resource];
        }

        if (! class_exists($resource)) {
            throw new Exception("Resource {$resource} Does Not Exist");
        }

        return $this->resources[$resource] = new $resource($this->endpoint(), $this->client());
    }

    protected function fullyQualified($name)
    {
        return "\\Woolf\\Shophpify\\Resource\\{$name}";
    }

    protected function endpoint()
    {
        return new Endpoint($this->domain);
    }

    protected function client()
    {
        return new Client($this->accessToken);
    }
}