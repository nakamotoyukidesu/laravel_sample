<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

final class RamenId
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->id;
    }
}
