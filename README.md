# SphereMall Gateway PHP SDK
Official PHP SDK for integrating with **SphereMall Product**.
[Official documentation](https://spheremall.atlassian.net/wiki/spaces/MIC/pages)

### Version 2.5.4.3
[Changelog 2.5.4.3](https://github.com/SphereMall/PHP-MS-Client/wiki/0.-SDK-Changelogs#version-1016)
#### Supported microservices
* Gateway 1.1.1
* Products 1.1.0
* Shop 1.0.1
* Users 1.0.0
* Grapher 1.0.0
* Documents 1.0.0
* StaticTexts 1.0.0

## Installation
You can install the package manually or by adding it to your `composer.json`:
```
{
  "require": {
      "spheremall/ms-client": "^1.0"
  }
}
```
## Instantiating the SDK Client:

Pass in the configuration to the client:

```php
$client = new Client([
            'gatewayUrl' => 'API_GATEWAY_URL',
            'clientId'   => 'API_CLIENT_ID',
            'secretKey'  => 'API_SECRET_KEY'
        ]);
```
## Using the client with base Resources functionality
* [Multiple Resources](https://github.com/SphereMall/PHP-MS-Client/wiki/1.-Multiple-Resources)
* [Single Resource by ID](https://github.com/SphereMall/PHP-MS-Client/wiki/2.-Single-Resource-by-ID)
* [Limiting and Offsetting Results](https://github.com/SphereMall/PHP-MS-Client/wiki/3.-Limiting-and-Offsetting-Results)
* [Filtering result with specific fields](https://github.com/SphereMall/PHP-MS-Client/wiki/4.-Filtering-result-with-specific-fields)
* [Sorting Results](https://github.com/SphereMall/PHP-MS-Client/wiki/5.-Sorting-Results)
* [Counting Results](https://github.com/SphereMall/PHP-MS-Client/wiki/6.-Counting-Results)
* [Product Resource](https://github.com/SphereMall/PHP-MS-Client/wiki/7.-Product-Resource)
  * [Get full](https://github.com/SphereMall/PHP-MS-Client/wiki/7.1.-Get-full)
* [Shop](https://github.com/SphereMall/PHP-MS-Client/wiki/8.-Shop-service)
* [ElasticSearch](https://github.com/SphereMall/PHP-MS-Client/wiki/9.-ElasticSearch)
