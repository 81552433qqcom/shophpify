# Shophpify
Shopify API wrapping in PHP

---


## Woolf\Shophpify\Client($accessToken = null)

Make requests to Shopify API and parse the response.

```php
<?php

$client = new Woolf\Shophpify\Client('a_valid_access_token');

$response = $client->get('https://my-new-store.myshopify.com/admin/shop?fields=id,name,email');

$shop = $client->parse($reponse, 'shop');

```

```
[
    "id":    690933842,
    "name":  "Apple Computers",
    "email": "steve@apple.com",
]
```

If created with an access token, Client objects will include a `X-Shopify-Access-Token` header with each request.


## Woolf\Shophpify\Endpoint($domain)

Builds full Shopify API endpoint for shop.

```php
<?php

$endpoint = new \Woolf\Shophpify\Endpoint('my-new-store.myshopify.com');

$url = $endpoint->build('admin/shop.json', ['fields' => 'id,name,email']);

```

`$endpoint->build(...)` above will return `https://my-new-store.myshopify.com/admin/shop.json?fields=id,name,email`


## Woolf\Shophpify\Signature($request)

Perform the security checks required by [Shopify](https://docs.shopify.com/api/guides/authentication/oauth#confirming-installation).

`https://example.org/some/redirect/uri?code={authorization_code}&hmac=da9d83c171400a41f8db91a950508985&timestamp=1409617544&state={nonce}&shop={hostname}`

```php
<?php

$signature = new Woolf\Shophpify\Signature($requestParametersAsArray);

$signature->hasValidHmac($hmac, 'client_secret'); 

$signature->hasValidHostname();

$signature->hasValidState($stateValueSetWhileRequestingAccessToShop);

```


## Woolf\Shophpify\Resource\Resource(Endpoint $endpoint, Client $client)

Resource is an abstract class with access to an Endpoint and Client object.

For convenience, a resource can be created by passing `$domain` and `$accessToken or nothing` to `::make($domain, $accessToken = null)`

```php
<?php

/*
 *  OAuth requests don't require an access token  
 */

$oauth = \Woolf\Shophpify\Resource\OAuth::make('my-new-store.myshopify.com');

/*
 *  Will need a valid access token to retrieve shop data
 */
 
$shop = \Woolf\Shopify\Resource\Shop::make('my-new-store.myshopify.com', 'a_valid_access_token');

```

