<?php

namespace Woolf\Shophpify;

class Signature
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function hasValidHmac($hmac, $secret)
    {
        return ($hmac === hash_hmac($this->hashingAlgorithm(), $this->message(), $secret));
    }

    protected function message()
    {
        $keysToRemove = ['signature', 'hmac'];

        return urldecode(http_build_query(array_diff_key($this->request, array_flip($keysToRemove))));
    }

    protected function hashingAlgorithm()
    {
        return 'sha256';
    }

    public function hasValidHostname()
    {
        return !! preg_match($this->validShopPattern(), $this->request['shop']);
    }

    protected function validShopPattern()
    {
        return '/^([a-z]|[0-9]|\.|-)+myshopify.com$/i';
    }

    public function hasValidNonce($state)
    {
        return ($state === $this->request['state']);
    }
}