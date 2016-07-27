<?php

namespace App\Http\Resources;


class Order extends Resource
{
    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/orders.json'));

        return $this->client->parse($response, 'orders');
    }

    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/orders/{$id}.json"));

        return $this->client->parse($response, 'order');
    }

    public function search($query = [])
    {
        $response = $this->client->get($this->endpoint->build('admin/orders.json', $query));
        return $this->client->parse($response, 'orders');
    }

    public function count($query = [])
    {
        $response = $this->client->get($this->endpoint->build('admin/orders/count.json', $query));

        return $this->client->parse($response, 'count');
    }

    public function create(array $order)
    {
        $response = $this->client->post($this->endpoint->build('admin/orders.json'), compact('order'));

        return $this->client->parse($response, 'order');
    }

    public function update($id, array $order)
    {
        $response = $this->client->put($this->endpoint->build("admin/orders/{$id}.json"), compact('order'));

        return $this->client->parse($response, 'order');
    }

    public function delete($id)
    {
        $response = $this->client->delete($this->endpoint->build("admin/orders/{$id}.json"));

        return $response->getStatusCode();
    }
}
