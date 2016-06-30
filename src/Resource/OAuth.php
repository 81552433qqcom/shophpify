<?php

namespace Woolf\Shophpify\Resource;

class OAuth extends Resource
{
    public function authorizationUrl($clientId, $scope, $redirectUri, $state)
    {
        return $this->endpoint->build('admin/oauth/authorize', [
            'client_id'    => $clientId,
            'scope'        => $scope,
            'redirect_uri' => $redirectUri,
            'state'        => $state
        ]);
    }

    public function requestAccessToken($clientId, $clientSecret, $code)
    {
        $response = $this->client->post($this->endpoint->build('admin/oauth/access_token'), [
            'client_id'     => $clientId,
            'client_secret' => $clientSecret,
            'code'          => $code
        ]);

        return $this->client->parse($response, 'access_token');
    }
}
