<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier;

use WeDesignIt\Dropshiphub\Resources\Resource;

class Shipment extends Resource
{

    public function carrier(string $carrier): self
    {
        $this->offsetSet('carrier', $carrier);

        return $this;
    }

    public function carrierService(string $carrierService): self
    {
        $this->offsetSet('carrier_service', $carrierService);

        return $this;
    }

    public function trackingNumber(string $trackingNumber): self
    {
        $this->offsetSet('tracking_number', $trackingNumber);

        return $this;
    }

    public function shipmentIdentifier(string $shipmentIdentifier): self
    {
        $this->offsetSet('shipment_identifier', $shipmentIdentifier);

        return $this;
    }

    public function trackingUrl(string $trackingUrl): self
    {
        $this->offsetSet('tracking_url', $trackingUrl);

        return $this;
    }

    public function items(array $items)
    {
        $this->offsetSet('order_items', $items);

        return $this;
    }

    public function item(array $item): self
    {
        $items = $this->offsetGet('order_items') ?? [];
        $items[] = $item;

        return $this;
    }
}