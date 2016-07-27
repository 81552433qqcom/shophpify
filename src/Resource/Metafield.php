<?php

namespace App\Http\Resources;


class Metafield extends Resource
{
    /*
    *============ Metafield in store
     */
    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/metafields.json'));
        return $this->client->parse($response, 'metafields');
    }


    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/metafields/{$id}.json"));
        return $this->client->parse($response, 'metafield');
    }

    public function getbyowner($owner_id,$owner_resource)
    {
        $response = $this->client->get($this->endpoint->build("/admin/metafields.json?metafield[owner_id]={$owner_id}&metafield[owner_resource]={$owner_resource}"));
        return $this->client->parse($response, 'metafield');
    }

    public function count($query = [])
    {
        $response = $this->client->get($this->endpoint->build('admin/themes/metafields.json', $query));
        return $this->client->parse($response, 'count');
    }

    public function create(array $metafield)
    {
        $response = $this->client->post($this->endpoint->build('admin/metafields.json'), compact('metafield'));
        return $this->client->parse($response, 'metafield');
    }

    public function update($id, array $metafield)
    {
        $response = $this->client->put($this->endpoint->build("admin/metafields/{$id}.json"), compact('metafield'));
        return $this->client->parse($response, 'metafield');
    }

    public function delete($id)
    {
        $response = $this->client->delete($this->endpoint->build("admin/metafields/{$id}.json"));
        return $response->getStatusCode();
    }
}
