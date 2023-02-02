<?php

namespace WeDesignIt\Dropshiphub\Endpoints\Supplier;

use WeDesignIt\Dropshiphub\Endpoints\Endpoint;

class Product extends Endpoint
{

    public function list(): array|string
    {
        return $this->client->request('get', 'suppliers/products');
    }

    public function get(string $productIdentifier): array|string
    {
        return $this->client->request('get', 'suppliers/products/' . $productIdentifier);
    }

    public function create(array $product): array|string
    {
        return $this->client->request('post', 'suppliers/products', ['json' => $product]);
    }

    public function update(string $productIdentifier, array $product): array|string
    {
        return $this->client->request('put', 'suppliers/products/' . $productIdentifier, ['json' => $product]);
    }

    public function delete(string $productIdentifier): array|string
    {
        return $this->client->request('delete', 'suppliers/products/' . $productIdentifier);
    }

}