# Shophpify
Shopify API Client in PHP

---


## Woolf\Shophpify\Shopify($domain, $accessToken = null)


### Create Shopify API Client

```php
<?php

$shopify = new Woolf\Shophpify\Shopify('my-new-store.myshopify.com');

```


### Update Store Domain

```php
<?php

...

$shopify = $shopify->setDomain('some-other-store.myshopify.com');
```


### Set Access Token For Store

```php
<?php

...

$shopify = $shopify->setAccessToken('a_valid_access_token');
```


### Get Shop Data

```php
<?php

...

$shop = $shopify->shop->get();
```


### Manage Products

```php
<?php

...

$products = $shopify->product->all();

$created = $shopify->product->create(['title' => 'My First Product']);

$product = $shopify->product->get($created['id']);

$updated = $shopify->product->update($product['id'], ['title' => 'A Better Title']);

$shopify->product->delete($updated['id']);
