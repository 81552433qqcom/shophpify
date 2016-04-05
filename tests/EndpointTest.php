<?php

use Woolf\Shophpify\Endpoint;

class EndpointTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function it_creates_endpoint_url_for_given_shop()
    {
        $endpoint = new Endpoint('foo.bar');

        $this->assertEquals('https://foo.bar/baz/qux', $endpoint->build('baz/qux'));
    }

    /** @test */
    function it_trims_extra_slashes_from_path()
    {
        $endpoint = new Endpoint('bar.foo');

        $this->assertEquals('https://bar.foo/baz/qux', $endpoint->build('/baz/qux/'));
    }

    /** @test */
    function it_adds_parameters_as_query_string()
    {
        $endpoint = new Endpoint('foo.bar');

        $this->assertEquals(
            'https://foo.bar/baz/qux?this=that&one=two',
            $endpoint->build('baz/qux', ['this' => 'that', 'one' => 'two'])
        );
    }

    /** @test */
    function it_accepts_object_for_query()
    {
        $endpoint = new Endpoint('foo.bar');

        $query = new stdClass();
        $query->this = 'that';
        $query->one = 'two';

        $this->assertEquals('https://foo.bar/baz/qux?this=that&one=two', $endpoint->build('baz/qux', $query));
    }
}