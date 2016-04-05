<?php

namespace Woolf\Shophpify;

class Endpoint
{
    protected $domain;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    public function build($path, $query = false)
    {
        $url = 'https://'.$this->domain.'/'.trim($path, '/');

        if ($query) {
            $url .= '?'.urldecode(http_build_query($query, '', '&'));
        }

        return $url;
    }
}