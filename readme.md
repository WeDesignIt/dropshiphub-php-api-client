# Dropshiphub API client for PHP

## Installing

```shell
composer require wedesignit/dropshiphub-php-api-client
```

## Creating the connector

```php
$client = new \WeDesignIt\Dropshiphub\Client($apiToken);
$dropshiphub = new \WeDesignIt\Dropshiphub\Dropshiphub($client);
```

