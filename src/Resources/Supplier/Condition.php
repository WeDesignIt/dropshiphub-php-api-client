<?php

namespace WeDesignIt\Dropshiphub\Resources\Supplier;

use WeDesignIt\Dropshiphub\Resources\Resource;

class Condition extends Resource
{

    const NEW = 'NEW';

    const AS_NEW = 'AS_NEW';

    const GOOD = 'GOOD';

    const REASONABLE = 'REASONABLE';

    const MODERATE = 'MODERATE';


    public function category(string $category): self
    {
        $this->offsetSet('category', $category);

        return $this;
    }

    public function condition(string $condition): self
    {
        $this->offsetSet('condition', $condition);

        return $this;
    }

}