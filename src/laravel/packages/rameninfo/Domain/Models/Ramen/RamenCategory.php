<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

final class RamenCategory
{
    private $category;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public static function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->category;
    }
}
