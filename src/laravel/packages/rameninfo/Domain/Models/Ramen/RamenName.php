<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

final class RamenName
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->name;
    }
}
