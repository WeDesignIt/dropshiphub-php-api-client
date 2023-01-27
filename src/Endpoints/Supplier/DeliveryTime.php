<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class DeliveryTime extends Endpoint
{

    public function list(): array|string
    {
        return $this->client->request('get', 'suppliers/delivery-times');
    }
}