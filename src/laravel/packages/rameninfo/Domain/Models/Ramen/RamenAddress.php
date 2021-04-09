<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

final class RamenAddress
{
    private $address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public static function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->address;
    }
}
