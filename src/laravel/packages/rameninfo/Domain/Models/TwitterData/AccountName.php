<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\TwitterData;


final class AccountName
{
    private $account_name;

    public function __construct(string $account_name)
    {
        $this->account_name = $account_name;
    }

    public function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->account_name;
    }
}
