<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\Ramen;


use rameninfo\Application\Requests\Ramen\RamenDeleteRequest;
use rameninfo\Application\Usecases\Ramen\DeleteRamen;

final class RamenDeleteController
{
    public function __invoke(RamenDeleteRequest $request, DeleteRamen $deleteRamen)
    {
        return $deleteRamen($request->ramen_id);
    }
}
