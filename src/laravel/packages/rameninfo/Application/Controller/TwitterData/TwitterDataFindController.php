<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\TwitterData;


use rameninfo\Application\Requests\TwitterData\TwitterDataFindRequest;
use rameninfo\Application\Usecases\TwitterData\FindTwitterData;

final class TwitterDataFindController
{
    public function __invoke(TwitterDataFindRequest $request, FindTwitterData $findTwitterData)
    {
        return $findTwitterData($request->ramen_id);
    }
}
