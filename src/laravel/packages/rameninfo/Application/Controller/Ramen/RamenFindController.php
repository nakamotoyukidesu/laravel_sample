<?php


namespace rameninfo\Application\Controller\Ramen;


use rameninfo\Application\Requests\Ramen\RamenFindRequest;
use rameninfo\Application\Usecases\Ramen\FindRamen;

final class RamenFindController
{
    public function __invoke(RamenFindRequest $request, FindRamen $findRamen)
    {
        return $findRamen($request->ramen_id);
    }
}
