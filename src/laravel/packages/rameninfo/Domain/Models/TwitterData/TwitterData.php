<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\TwitterData;


final class TwitterData
{
    private $ramen_id;

    private $twitter_id;

    private $query;

    private $account_name;

    public function __construct
    (
        RamenId $ramen_id,
        TwitterId $twitter_id,
        SearchQuery $query,
        AccountName $account_name
    )
    {
        $this->ramen_id = $ramen_id;
        $this->twitter_id = $twitter_id;
        $this->query = $query;
        $this->account_name = $account_name;
    }

    public function ramen_id() : RamenId
    {
        return $this->ramen_id;
    }

    public function twitter_id() : TwitterId
    {
        return $this->twitter_id;
    }

    public function query() : SearchQuery
    {
        return $this->query;
    }

    public function account_name() : AccountName
    {
        return $this->account_name;
    }

    public function toArray(){
        return [
            'ramen_id' => $this->ramen_id->value(),
            'twitter_id' => $this->twitter_id->value(),
            'query' => $this->query->value(),
            'account_name' => $this->account_name->value()
        ];
    }
}
