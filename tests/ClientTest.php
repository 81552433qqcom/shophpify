<?php

use Woolf\Shophpify\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function it_builds_client_with_access_token_header_if_provided()
    {
        $client = new Client('client_id', 'client_secret', 'access_token');

        $this->assertArrayHasKey('headers', $client->config());

        $this->assertArrayHasKey('X-Shopify-Access-Token', $client->config()['headers']);

        $this->assertEquals('access_token', $client->config()['headers']['X-Shopify-Access-Token']);
    }
}