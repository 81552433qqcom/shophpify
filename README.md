# Shophpify
Shopify API wrapping in PHP

---


## Woolf\Shophpify\Client($accessToken = null)

Make requests to Shopify API and parse the response.

If created with an access token, it will include a `X-Shopify-Access-Token` header with each request.


## Woolf\Shophpify\Endpoint($domain)

Build full Shopify API endpoint for shop.

```php
<?php

$endpoint = new \Woolf\Shophpify\Endpoint('my-new-store.myshopify.com');

$url = $endpoint->build('admin/shop.json', ['fields' => 'id,name,email']);

```

`$endpoint->build(...)` above will return `https://my-new-store.myshopify.com/admin/shop.json?fields=id,name,email`


## Woolf\Shophpify\Resource\Resource(Endpoint $endpoint, Client $client)

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
