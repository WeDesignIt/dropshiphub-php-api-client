<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier;

use WeDesignIt\Dropshiphub\Resources\Resource;

class Pricing extends Resource
{

    public function bundle(int $quantity, float $price): self
    {
        $bundles = $this->offsetGet('bundles') ?? [];
        $bundles[] = compact('quantity', 'price');

        $this->offsetSet('bundles', $bundles);

        return $this;
    }

    public function toArray(): array
    {
        return $this->offsetGet('bundles');
    }
}