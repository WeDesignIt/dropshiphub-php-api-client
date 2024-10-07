<?php

namespace WeDesignIt\Dropshiphub;

use WeDesignIt\Dropshiphub\Endpoints\Company;
use WeDesignIt\Dropshiphub\Endpoints\Dropshipper\Catalog\Catalog;
use WeDesignIt\Dropshiphub\Endpoints\Supplier\Supplier;

class Dropshiphub
{

    private Client $client;

    /**
     * Dropshiphub client constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Ping the Dropshiphub API to check the connection
     *
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ping(): array|string
    {
        return $this->client->request('get', 'ping');
    }

    /**
     * Ping the Dropshiphub API with your token to check the connection
     *
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function status(): array|string
    {
        return $this->client->request('get', 'status');
    }

    /**
     * Base accessor for the Company endpoint
     *
     * @return Company
     */
    public function company(): Company
    {
        return new Company($this->client);
    }

    /**
     * Base accessor for the Catalog endpoint
     *
     * @return Catalog
     */
    public function catalog(): Catalog
    {
        return new Catalog($this->client);
    }

    /**
     * Base accessor for the Supplier endpoint
     *
     * @return Supplier
     */
    public function supplier(): Supplier
    {
        return new Supplier($this->client);
    }
}