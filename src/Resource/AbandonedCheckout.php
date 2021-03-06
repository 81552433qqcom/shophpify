<?php

namespace Woolf\Shophpify\Resource;

class AbandonedCheckout extends Resource
{
    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/checkouts.json'));

        return $this->client->parse($response, 'checkouts');
    }

    public function count()
    {
        $response = $this->client->get($this->endpoint->build('admin/checkouts/count.json'));

        return $this->client->parse($response, 'count');
    }
}