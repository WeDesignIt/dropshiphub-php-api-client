<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier;

use WeDesignIt\Dropshiphub\Resources\Resource;

class EconomicOperator extends Resource
{

    public function id(string $id): self
    {
        $this->offsetSet('id', $id);

        return $this;
    }

    public function name(string $name): self
    {
        $this->offsetSet('name', $name);

        return $this;
    }

    public function street(string $street): self
    {
        $this->offsetSet('street', $street);

        return $this;
    }

    public function houseNumber(string $houseNumber): self
    {
        $this->offsetSet('house_number', $houseNumber);

        return $this;
    }

    public function additionalAddressDetails(string $additionalAddressDetails): self
    {
        $this->offsetSet('additional_address_details', $additionalAddressDetails);

        return $this;
    }

    public function postalCode(string $postalCode): self
    {
        $this->offsetSet('postal_code', $postalCode);

        return $this;
    }

    public function city(string $city): self
    {
        $this->offsetSet('city', $city);

        return $this;
    }

    public function country(string $country): self
    {
        $this->offsetSet('country', $country);

        return $this;
    }

    public function contactEmail(string $contactEmail): self
    {
        $this->offsetSet('contact_email', $contactEmail);

        return $this;
    }

    public function contactPhone(string $contactPhone): self
    {
        $this->offsetSet('contact_phone', $contactPhone);

        return $this;
    }
}