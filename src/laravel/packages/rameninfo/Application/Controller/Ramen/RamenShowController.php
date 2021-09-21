<?php


namespace rameninfo\Application\Controller\Ramen;


use rameninfo\Application\Requests\Ramen\RamenShowRequest;
use rameninfo\Application\Usecases\Ramen\ShowRamen;

class RamenShowController
{
    public function __invoke(RamenShowRequest $request, ShowRamen $showRamen)
    {
        return $showRamen($request->extentions);
    }
}
