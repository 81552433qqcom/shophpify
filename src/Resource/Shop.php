<?php

namespace Woolf\Shophpify\Resource;

class Shop extends Resource
{
    public function get($fields = [])
    {
        if (! empty($fields)) {
            $fields = ['fields' => implode(',', $fields)];
        }

        $response = $this->client->get($this->endpoint->build('admin/shop.json', $fields));

        return $this->client->parse($response, 'shop');
    }
}