<?php

namespace App\Http\Resources;


class Asset extends Resource
{
    public function all($theme_id)
    {
        $response = $this->client->get($this->endpoint->build('admin/themes/{$theme_id}/assets.json'));
        return $this->client->parse($response, 'assets');
    }

    public function get($theme_id,array $asset)
    {
        $response = $this->client->get($this->endpoint->build("admin/themes/{$theme_id}/assets.json",$asset));
        return $this->client->parse($response, 'asset');
    }

    public function create($theme_id,array $asset)
    {
        $response = $this->client->post($this->endpoint->build("admin/themes/{$theme_id}/assets.json"), compact('asset'));
        return $this->client->parse($response, 'asset');
    }

    public function update($theme_id, array $asset)
    {
        $response = $this->client->put($this->endpoint->build("admin/themes/{$theme_id}/assets.json"), compact('asset'));
        return $this->client->parse($response, 'asset');
    }

    public function delete($theme_id,array $asset)
    {
        $response = $this->client->delete($this->endpoint->build("admin/themes/{$theme_id}/assets.json"),compact('asset'));
        return $response->getStatusCode();
    }
}
