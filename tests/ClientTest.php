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

    /** @test */
    function it_builds_client_with_empty_array_as_config_if_no_access_token_provided()
    {
        $client = new Client('client_id', 'client_secret');

        $this->assertEmpty($client->config());
    }

    /** @test */
    function it_can_decode_and_parse_response_object()
    {
        $response = new \GuzzleHttp\Psr7\Response(200, [], json_encode(['works' => true]));

        $client = new Client('client_id', 'client_secret');

        $this->assertEquals(['works' => true], $client->parse($response));
        $this->assertTrue($client->parse($response, 'works'));
        $this->assertFalse($client->parse($response, 'key_does_not_exist'));
    }
}