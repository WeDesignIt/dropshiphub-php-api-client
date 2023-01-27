<?php

namespace WeDesignIt\Dropshiphub\Resources;

use WeDesignIt\Dropshiphub\Interfaces\Arrayable;
use WeDesignIt\Dropshiphub\Interfaces\HasRequiredFields;

class Resource implements \ArrayAccess, Arrayable, HasRequiredFields
{

    protected array $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * For fluent constructing.
     *
     * @param array $data
     *
     * @return static
     */
    public static function create(array $data = []): self
    {
        return new static($data);
    }

    /**
     * @return array
     */
    public function getRequiredFields(): array
    {
        return [];
    }

    /**
     * @return bool
     */
    public function containsAllRequiredFields(): bool
    {
        foreach ($this->getRequiredFields() as $requiredField) {
            if (!array_key_exists($requiredField, $this->data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }
}