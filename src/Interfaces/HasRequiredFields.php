<?php

namespace WeDesignIt\Dropshiphub\Interfaces;

interface HasRequiredFields
{

    /**
     * Returns the required fields
     *
     * @return array
     */
    public function getRequiredFields(): array;
}
