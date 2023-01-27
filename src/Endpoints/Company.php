<?php

namespace WeDesignIt\Dropshiphub\Endpoints;

class Company extends Endpoint
{

    /**
     * List the companies you can access with your API key.
     *
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list() : array|string
    {
        return $this->client->request('get', 'companies');
    }
}