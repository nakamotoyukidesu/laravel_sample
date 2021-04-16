<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\Ramen;



use ArrayObject;
use Illuminate\Http\JsonResponse;
use rameninfo\Application\Requests\Ramen\RamenSaveRequest;
use rameninfo\Application\Usecases\Ramen\SaveRamen;

final class RamenSaveController
{
    public function __invoke(RamenSaveRequest $request, SaveRamen $saveRamen): JsonResponse
    {
        $ramens = [];
        foreach ($request->saveRamen() as $ramen){
            $ramens[$ramen->ramen_id()->value()] = $saveRamen($ramen);
        }
        return $this->response($ramens);
    }

    public function response(array $ramens) : JsonResponse
    {
        $ramen_array = [];
        foreach ($ramens as $ramen)
        {
            $ramen_array[$ramen->ramen_id()->value()] =
            [
                'ramen_id' => $ramen->ramen_id()->value(),
                'name' => $ramen->name()->value(),
                'category' => $ramen->category()->value(),
                'image_url' => $ramen->image_url()->value(),
                'address' => $ramen->address()->value(),
            ];
        }
        return response()->json($ramen_array);
    }
}
