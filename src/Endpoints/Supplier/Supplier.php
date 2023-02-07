<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;
use WeDesignIt\Dropshiphub\Endpoints\Supplier\Order\Order;
use WeDesignIt\Dropshiphub\Endpoints\Supplier\Order\Shipment;

class Supplier extends Endpoint
{

    public function status()
    {
        return $this->client->request('get', 'suppliers');
    }

    public function order(): Order
    {
        return new Order($this->client);
    }

    public function deliveryTime(): DeliveryTime
    {
        return new DeliveryTime($this->client);
    }

    public function product(): Product
    {
        return new Product($this->client);
    }

}