<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\TwitterData;


final class Query
{
    private $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    public function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->query;
    }
}
