<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier;

use WeDesignIt\Dropshiphub\Resources\Resource;

class Product extends Resource
{

    const MEASURE_MILLIMETER = 'mm';
    const MEASURE_CENTIMETER = 'cm';
    const MEASURE_METER = 'm';
    const MEASURE_KILOMETER = 'km';

    const MEASURE_MILLIGRAM = 'mg';
    const MEASURE_GRAM = 'g';
    const MEASURE_KILOGRAM = 'kg';

    public function ean(string $ean): self
    {
        $this->offsetSet('ean', $ean);

        return $this;
    }

    public function sku(string $sku): self
    {
        $this->offsetSet('sku', $sku);

        return $this;
    }

    public function isbn(string $isbn): self
    {
        $this->offsetSet('isbn', $isbn);

        return $this;
    }

    public function articleNumber(string $articleNumber): self
    {
        $this->offsetSet('article_number', $articleNumber);

        return $this;
    }

    public function title(string $title): self
    {
        $this->offsetSet('title', $title);

        return $this;
    }

    /**
     * Synonym for title
     *
     * @param string $name
     * @return $this
     */
    public function name(string $name): self
    {
        $this->offsetSet('title', $name);

        return $this;
    }

    public function brand(string $brand): self
    {
        $this->offsetSet('brand', $brand);

        return $this;
    }

    public function description(string $description): self
    {
        $this->offsetSet('description', $description);

        return $this;
    }

    public function length(int $length, string $measure): self
    {
        return $this->dimension('length', $length, $measure);
    }

    public function width(int $width, string $measure): self
    {
        return $this->dimension('width', $width, $measure);
    }

    public function height(int $height, string $measure): self
    {
        return $this->dimension('height', $height, $measure);
    }

    protected function dimension(string $title, int $value, string $unit): self
    {
        $dimension = [
            'value' => $value,
            'unit' => $unit
        ];
        $this->offsetSet($title, $dimension);

        return $this;
    }

    public function weight(int $weight, string $measure): self
    {
        $weight = [
            'value' => $weight,
            'unit' => $measure
        ];
        $this->offsetSet('weight', $weight);

        return $this;
    }

    public function stock(int $stock): self
    {
        $this->offsetSet('stock', $stock);

        return $this;
    }

    public function pricing(Pricing $pricing): self
    {
        $this->offsetSet('pricing', $pricing->toArray());

        return $this;
    }

    public function taxPercentage(float $taxPercentage): self
    {
        $this->offsetSet('tax_pct', $taxPercentage);

        return $this;
    }

    /**
     * Synonym for taxPercentage
     *
     * @param float $taxRate
     * @return $this
     */
    public function taxRate(float $taxRate): self
    {
        return $this->taxPercentage($taxRate);
    }

    public function deliveryTime(string $deliveryTime): self
    {
        $this->offsetSet('delivery_time', $deliveryTime);

        return $this;
    }

    public function warranty(string $warranty): self
    {
        $this->offsetSet('warranty', $warranty);

        return $this;
    }

    public function images(array $images): self
    {
        $this->offsetSet('images', $images);

        return $this;
    }

    public function image(string $image): self
    {
        $images = $this->offsetGet('images') ?? [];
        $images[] = $image;
        return $this->images($images);
    }

    public function condition(Condition $condition): self
    {
        $this->offsetSet('condition', $condition->toArray());

        return $this;
    }

    public function economicOperator(EconomicOperator $economicOperator): self
    {
        $this->offsetSet('economic_operator', $economicOperator->toArray());

        return $this;
    }

}