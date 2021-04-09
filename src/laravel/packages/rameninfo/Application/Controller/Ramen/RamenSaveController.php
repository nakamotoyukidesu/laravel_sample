<?php

declare(strict_types=1);

namespace packages\rameninfo\Application\Controller\Ramen;


use Illuminate\Http\JsonResponse;
use rameninfo\Application\Requests\Ramen\RamenSaveRequest;
use rameninfo\Application\Usecases\Ramen\SaveRamen;

final class RamenSaveController
{
    public function __invoke(RamenSaveRequest $request, SaveRamen $saveRamen)
    {
        $ramens = array();
        foreach ($request->saveRamen() as $ramen){
            $ramens += $saveRamen($ramen);
        }
        return $this->response($ramens);
    }

    public function response(array $ramens) : JsonResponse
    {
        return response()->json($ramens);
    }
}
