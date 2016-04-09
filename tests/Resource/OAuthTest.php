<?php

use Woolf\Shophpify\Resource\OAuth;

class OAuthTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function it_can_be_created_by_passing_domain_to_static_method()
    {
        $oauth = OAuth::make('foo.bar');

        $this->assertEquals(
            'https://foo.bar/admin/oauth/authorize?client_id=A&scope=B&redirect_uri=C&state=D',
            $oauth->authorizationUrl('A', 'B','C','D')
        );
    }
}