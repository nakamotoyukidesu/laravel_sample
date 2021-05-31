<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\TwitterData;

interface TwitterDataRepository
{
    public function save(TwitterData $twitterData);

    public function find(string $ramen_id);

    public function show();

    public function delete();

    public function edit(TwitterData $twitterData);
}
