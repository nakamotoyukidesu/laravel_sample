<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\TwitterData;


use rameninfo\Application\Requests\TwitterData\TwitterDataDeleteRequest;
use rameninfo\Application\Usecases\TwitterData\DeleteTwitterData;

final class TwitterDataDeleteController
{
    public function __invoke(TwitterDataDeleteRequest $request, DeleteTwitterData $deleteTwitterData)
    {
        return $deleteTwitterData($request->ramen_id);
    }
}
