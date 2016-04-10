<?php

use Woolf\Shophpify\Resource\ApplicationCharge;
use Woolf\Shophpify\Testing\Resource\ResourceTestCase;

class ApplicationChargeTest extends ResourceTestCase
{
    /** @test */
    function it_charges_store()
    {
        if (! static::dotenv()) {
            return $this->markTestSkipped('Skipping tests requiring .env');
        }

        $applicationCharge = new ApplicationCharge($this->endpoint(), $this->client());

        $charge = $applicationCharge->create([
            'name'       => 'Test Charge',
            'price'      => '3.99',
            'return_url' => 'http://super-duper.shopifyapps.com',
            'test'       => true
        ]);

        $this->assertTrue(is_array($charge));
        $this->assertArrayHasKey('id', $charge);
        $this->assertTrue($charge['test']);
    }

    /** @test */
    function it_gets_all_charges_for_store()
    {
        if (! static::dotenv()) {
            return $this->markTestSkipped('Skipping tests requiring .env');
        }

        $applicationCharge = new ApplicationCharge($this->endpoint(), $this->client());

        $charges = $applicationCharge->all();

        $this->assertNotEmpty($charges);
    }

    /** @test */
    function it_gets_single_charge_for_store()
    {
        if (! static::dotenv()) {
            return $this->markTestSkipped('Skipping tests requiring .env');
        }

        $applicationCharge = new ApplicationCharge($this->endpoint(), $this->client());

        $charges = $applicationCharge->all();

        $charge = $applicationCharge->get($charges[0]['id']);

        $this->assertNotEmpty($charge);
    }
}