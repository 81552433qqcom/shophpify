<?php

namespace Woolf\Shophpify\Resource;

class Webhook extends Resource
{
    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/webhooks.json'));

        return $this->client->parse($response, 'webhooks');
    }

    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/webhooks/{$id}.json"));

        return $this->client->parse($response, 'webhook');
    }

    public function count($query = [])
    {
        $response = $this->client->get($this->endpoint->build('admin/products/count.json', $query));

        return $this->client->parse($response, 'count');
    }

    public function create(array $webhook)
    {
        $response = $this->client->post($this->endpoint->build('admin/webhooks.json'), compact('webhook'));

        return $this->client->parse($response, 'webhook');
    }

    public function delete($id)
    {
        $response = $this->client->delete($this->endpoint->build("admin/webhooks/{$id}.json"));

        return $response->getStatusCode();
    }
}
