<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Supplier extends Endpoint
{

    public function status()
    {
        return $this->client->request('get', 'suppliers');
    }
}