<?php

declare(strict_types=1);

namespace twitterinfo\Domain\Models\TwitterData;


final class TwitterId
{
    private $twitter_id;

    public function __construct(string $twitter_id)
    {
        $this->twitter_id = $twitter_id;
    }

    public function of(string $value) :self
    {
        return new static($value);
    }

    public function value() :string
    {
        return $this->twitter_id;
    }
}
