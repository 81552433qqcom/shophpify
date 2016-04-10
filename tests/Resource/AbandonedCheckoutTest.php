<?php

use Woolf\Shophpify\Resource\AbandonedCheckout;

class AbandonedCheckoutTest extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        if (! file_exists(__DIR__.'/../../.env')) {
            throw new Exception('No .env file found');
        }

        (new \Dotenv\Dotenv(__DIR__.'/../../'))->load();
    }

    protected function client()
    {
        return new \Woolf\Shophpify\Client(getenv('SHOPIFY_ACCESS_TOKEN'));
    }

    protected function endpoint()
    {
        return new \Woolf\Shophpify\Endpoint(getenv('SHOPIFY_STORE_DOMAIN'));
    }

    /** @test */
    function it_gets_number_of_abandoned_checkouts_for_shop()
    {
        $abandonedCheckout = new AbandonedCheckout($this->endpoint(), $this->client());

        $checkouts = $abandonedCheckout->all();

        $this->assertTrue(is_array($checkouts));
    }
}