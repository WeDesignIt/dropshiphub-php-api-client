<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Dropshipper\Catalog;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Product extends Endpoint
{

    public function list(string $catalogIdentifier): array|string
    {
        return $this->client->request('get', 'catalogs/' . $catalogIdentifier . '/products');
    }

}