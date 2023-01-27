<?php

namespace WeDesignIt\Dropshiphub;

use WeDesignIt\Dropshiphub\Endpoints\Company;
use WeDesignIt\Dropshiphub\Endpoints\Dropshipper\Catalog\Catalog;
use WeDesignIt\Dropshiphub\Endpoints\Supplier\Supplier;

class Dropshiphub
{

    private Client $client;

    /**
     * Sendy constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function ping(): array|string
    {
        return $this->client->request('get', 'ping');
    }

    public function status(): array|string
    {
        return $this->client->request('get', 'status');
    }

    public function company(): Company
    {
        return new Company($this->client);
    }

    public function catalog(): Catalog
    {
        return new Catalog($this->client);
    }

    public function supplier(): Supplier
    {
        return new Supplier($this->client);
    }
}