<?php

namespace App\Http\Resources;

class ScriptTag extends Resource
{
    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/script_tags.json'));

        return $this->client->parse($response, 'script_tags');
    }

    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/script_tags/{$id}.json"));

        return $this->client->parse($response, 'script_tag');
    }

    public function count($query = [])
    {
        $response = $this->client->get($this->endpoint->build('admin/script_tags/count.json', $query));

        return $this->client->parse($response, 'count');
    }

    public function create(array $script_tag)
    {
        $response = $this->client->post($this->endpoint->build('admin/script_tags.json'), compact('script_tag'));

        return $this->client->parse($response, 'script_tag');
    }

    public function delete($id)
    {
        $response = $this->client->delete($this->endpoint->build("admin/script_tags/{$id}.json"));

        return $response->getStatusCode();
    }
}
