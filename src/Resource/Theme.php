<?php

namespace App\Http\Resources;


class Theme extends Resource
{
    public function all()
    {
        $response = $this->client->get($this->endpoint->build("admin/themes.json"));

        return $this->client->parse($response, 'themes');
    }

    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/themes/{$id}.json"));

        return $this->client->parse($response, 'theme');
    }

    public function count($query = [])
    {
        $response = $this->client->get($this->endpoint->build("admin/themes/count.json", $query));

        return $this->client->parse($response, 'count');
    }

    public function create(array $theme)
    {
        $response = $this->client->post($this->endpoint->build("admin/themes.json"), compact('theme'));

        return $this->client->parse($response, 'theme');
    }

    public function update($id, array $theme)
    {
        $response = $this->client->put($this->endpoint->build("admin/themes/{$id}.json"), compact('theme'));

        return $this->client->parse($response, 'theme');
    }

    public function delete($id)
    {
        $response = $this->client->delete($this->endpoint->build("admin/themes/{$id}.json"));

        return $response->getStatusCode();
    }
}
