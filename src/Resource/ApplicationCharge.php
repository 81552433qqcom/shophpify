<?php

namespace Woolf\Shophpify\Resource;

class ApplicationCharge extends Resource
{

    public function all()
    {
        $response = $this->client->get($this->endpoint->build('admin/application_charges.json'));

        return $this->client->parse($response, 'application_charges');
    }

    public function get($id)
    {
        $response = $this->client->get($this->endpoint->build("admin/application_charges/{$id}.json"));

        return $this->client->parse($response, 'application_charge');
    }

    public function create($charge)
    {
        $url = $this->endpoint->build('admin/application_charges.json');

        $response = $this->client->post($url, ['application_charge' => $charge]);

        return $this->client->parse($response, 'application_charge');
    }

    public function activate($id)
    {
        $url = $this->endpoint->build("admin/application_charges/{$id}/activate.json");

        $response = $this->client->post($url, ['application_charge' => $id]);

        return $response->getStatusCode();
    }
}