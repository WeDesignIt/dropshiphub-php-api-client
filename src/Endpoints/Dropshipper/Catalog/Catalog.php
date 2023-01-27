<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Dropshipper\Catalog;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Catalog extends Endpoint
{

    public function list(): array|string
    {
        return $this->client->request('get', 'catalogs');
    }

    public function get(string $identifier): array|string
    {
        return $this->client->request('get', 'catalogs/' . $identifier);
    }

    public function products()
    {
        return new Product($this->client);
    }
}
