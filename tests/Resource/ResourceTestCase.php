<?php

namespace Woolf\Shophpify\Testing\Resource;

use Dotenv\Dotenv;
use Exception;
use PHPUnit_Framework_TestCase;
use Woolf\Shophpify\Client;
use Woolf\Shophpify\Endpoint;

abstract class ResourceTestCase extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        if (! static::dotenv()) {
            throw new Exception('No .env file found');
        }

        (new Dotenv(__DIR__.'/../../'))->load();
    }

    protected static function dotenv()
    {
        return file_exists(__DIR__.'/../../.env');
    }

    protected function client()
    {
        return new Client(getenv('SHOPIFY_ACCESS_TOKEN'));
    }

    protected function endpoint()
    {
        return new Endpoint(getenv('SHOPIFY_STORE_DOMAIN'));
    }
}
