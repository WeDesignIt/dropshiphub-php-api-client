<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier\Order;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Shipment extends Endpoint
{

    public function list(string $orderIdentifier, string $orderStatus = Order::STATUS_OPEN): array|string
    {
        return $this->client->request('get', 'suppliers/orders/' . $orderIdentifier . '/shipments');
    }

    public function create(string $orderIdentifier, array $data): array|string
    {
        return $this->client->request('post', 'suppliers/orders/' . $orderIdentifier . '/shipments', ['json' => $data]);
    }
}