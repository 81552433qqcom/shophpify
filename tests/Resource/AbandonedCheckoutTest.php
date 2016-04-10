<?php

use Woolf\Shophpify\Resource\AbandonedCheckout;
use Woolf\Shophpify\Testing\Resource\ResourceTestCase;

class AbandonedCheckoutTest extends ResourceTestCase
{

    /** @test */
    function it_gets_of_abandoned_checkouts_for_shop()
    {
        $abandonedCheckout = new AbandonedCheckout($this->endpoint(), $this->client());

        $checkouts = $abandonedCheckout->all();

        $this->assertTrue(is_array($checkouts));
    }

    /** @test */
    function it_gets_number_of_abandoned_checkouts_for_shop()
    {
        $abandonedCheckout = new AbandonedCheckout($this->endpoint(), $this->client());

        $this->assertTrue(is_int($abandonedCheckout->count()));
    }
}