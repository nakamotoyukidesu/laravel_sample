<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

final class RamenImage
{
    private $image;

    public function __construct(string $image)
    {
        $this->image = $image;
    }

    public static function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->image;
    }
}
