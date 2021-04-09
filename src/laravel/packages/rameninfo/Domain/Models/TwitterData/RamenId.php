<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\TwitterData;


final class RamenId
{
    private $ramen_id;

    public function __construct(string $ramen_id)
    {
        $this->ramen_id = $ramen_id;
    }

    public function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->ramen_id;
    }
}
