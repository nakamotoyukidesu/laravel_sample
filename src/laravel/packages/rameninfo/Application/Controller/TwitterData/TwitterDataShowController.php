<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\TwitterData;


use rameninfo\Application\Usecases\TwitterData\ShowTwitterData;

final class TwitterDataShowController
{
    public function __invoke(TwitterDataShowController $request, ShowTwitterData $showTwitterData)
    {
        return $showTwitterData();
    }
}
