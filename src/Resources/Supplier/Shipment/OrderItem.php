<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier\Shipment;

use WeDesignIt\Dropshiphub\Resources\Resource;

class OrderItem extends Resource
{

    public function orderItemIdentifier(string $orderItemIdentifier): self
    {
        $this->offsetSet('order_item', $orderItemIdentifier);

        return $this;
    }

    /**
     * Alias for orderItemIdentifier
     *
     * @param string $identifier
     *
     * @return $this
     */
    public function identifier(string $identifier): self
    {
        return $this->orderItemIdentifier($identifier);
    }

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
}