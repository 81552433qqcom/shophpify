<?php

use Dotenv\Dotenv;
use Woolf\Shophpify\Shopify;

class ShopifyTest extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        if (! file_exists(__DIR__.'/../.env')) {
            throw new Exception('No .env file found');
        }

        (new Dotenv(__DIR__.'/../'))->load();
    }

    /** @test */
    function it_creates_a_oauth_resource()
    {
        $shopify = new Shopify('foo.bar');

        $oauth = $shopify->resource('OAuth');

        $this->assertEquals(
            'https://foo.bar/admin/oauth/authorize?client_id=A&scope=B&redirect_uri=C&state=D',
            $oauth->authorizationUrl('A', 'B','C','D')
        );
    }

    /** @test */
    function it_can_build_resource_with_valid_access_token()
    {
        $shopify = new Shopify(getenv('SHOPIFY_STORE_DOMAIN'));

        $shopify = $shopify->setAccessToken(getenv('SHOPIFY_ACCESS_TOKEN'));

        $this->assertArrayHasKey('id', $shopify->resource('Shop')->get());
    }
}