<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier\Order;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Order extends Endpoint
{

    const STATUS_OPEN = 'open';
    const STATUS_ANY = 'any';

    public function list(string $status = self::STATUS_OPEN): array|string
    {
        return $this->client->request('get', 'suppliers/orders');
    }

    public function get(string $orderIdentifier): array|string
    {
        return $this->client->request('get', 'suppliers/orders/' . $orderIdentifier);
    }

    public function confirm(string $dshOrderIdentifier, string $yourOrderNumber): array|string
    {
        return $this->client->request('post', 'suppliers/orders/' . $dshOrderIdentifier . '/confirm', [
            'order' => $yourOrderNumber,
        ]);
    }

    public function shipment(): Shipment
    {
        return new Shipment($this->client);
    }

}